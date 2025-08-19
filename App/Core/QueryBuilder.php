<?php
namespace App\Core;

// QueryBuilder.php
class QueryBuilder
{
    private ?string $table = null;
    private string $selects = '*';
    private array $conditions = [];
    private ?string $order = null;
    private ?int $limit = null;

    public function table(string $table): self
    {
        $this->table = $table;
        return $this;
    }

    public function select(array|string $fields): self
    {
        $this->selects = is_array($fields) ? implode(', ', $fields) : $fields;
        return $this;
    }

    public function where(string $field, string $operator, mixed $value): self
    {
        $this->conditions[] = [$field, strtoupper($operator), $value];
        return $this;
    }

    public function orderBy(string $field, string $direction = 'ASC'): self
    {
        $dir = strtoupper($direction) === 'DESC' ? 'DESC' : 'ASC';
        $this->order = "$field $dir";
        return $this;
    }

    public function limit(int $n): self
    {
        $this->limit = max(0, (int)$n);
        return $this;
    }

    public function getSQL(): string
    {
        if (!$this->table) {
            throw new \LogicException('No table selected. Call table() first.');
        }

        $sql = "SELECT {$this->selects} FROM {$this->table}";

        if (!empty($this->conditions)) {
            $clauses = [];
            foreach ($this->conditions as [$field, $op, $value]) {
                switch ($op) {
                    case 'IN':
                        if (!is_array($value) || empty($value)) {
                            throw new \InvalidArgumentException('IN expects a non-empty array.');
                        }
                        $vals = implode(', ', array_map([$this, 'quoteValue'], $value));
                        $clauses[] = "$field IN ($vals)";
                        break;

                    case 'BETWEEN':
                        if (!is_array($value) || count($value) !== 2) {
                            throw new \InvalidArgumentException('BETWEEN expects an array of exactly two values.');
                        }
                        $clauses[] = "$field BETWEEN " .
                                     $this->quoteValue($value[0]) .
                                     " AND " .
                                     $this->quoteValue($value[1]);
                        break;

                    case 'IS':
                        // يدعم: where('deleted_at', 'IS', null)
                        $clauses[] = is_null($value) ? "$field IS NULL" : "$field IS {$this->quoteValue($value)}";
                        break;

                    default:
                        $clauses[] = "$field $op " . $this->quoteValue($value);
                        break;
                }
            }
            $sql .= ' WHERE ' . implode(' AND ', $clauses);
        }

        if ($this->order) {
            $sql .= ' ORDER BY ' . $this->order;
        }

        if ($this->limit !== null) {
            $sql .= ' LIMIT ' . $this->limit;
        }

        return $sql . ';';
    }

    // --- helpers ---
    private function quoteValue(mixed $value): string
    {
        if (is_null($value)) return 'NULL';
        if (is_bool($value)) return $value ? '1' : '0';
        if (is_int($value) || is_float($value) || (is_string($value) && is_numeric($value))) {
            return (string)$value;
        }
        // هروب بسيط للأحرف الأحادية لتجنب كسر السلسلة
        $escaped = str_replace("'", "''", (string)$value);
        return "'" . $escaped . "'";
    }
}
