<?php

class Node implements NodeInterface
{
    public $branch;
    public $name;


    public function __construct($name)
    {
        $this->name = $name;
    }
    

    private function prn($s, $branch)
    {
        foreach ($branch as $key => $vertex) {
            $out .= $s . $key . PHP_EOL;
            if ($vertex) {
                $out .= $this->prn($s . '+', $vertex);
            }
        }
        
        return $out;
    }


    public function __toString(): string
    {
        return $this->prn('+', $this->branch);
    }


    public function getName(): string
    {
        return $this->name;
    }


    /**
     * @return Node[]
     */
    public function addChild(Node $node): Node
    {
        $this->branch[$this->name][$node->getName()] = $node->getChildren();

        return $this;
    }
    
    
    public function getChildren(): array
    {
        return $this->branch[$this->name] ?? [];
    }
}

