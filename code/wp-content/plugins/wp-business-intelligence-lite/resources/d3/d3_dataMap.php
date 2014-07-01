<?php
/**
 * File Name: d3_dataMap.php
 * User: Claudio Alberti
 * Date: 13/03/14
 * Time: 18:31
 
 */

class d3_dataMap {

    /**
     * loaded data
     *
     * @var array $loaded_rows
     */
    private $loaded_rows=array();

    /**
     * Excel cell list
     * @var array $filter
     */
    private $filter=array();

    public function __construct($sqlOutput = '') {
        if ($sqlOutput != '') {
            $this->loaded_rows = $sqlOutput;
        }
        return TRUE;
    }

    function setData($data){
        $this->loaded_rows = $data;
    }

    public function returnColumnsHeaders()
    {
        $headersString = "";
        $keys = array_keys($this->loaded_rows[1]);

        for ($i=0; $i < count($this->loaded_rows[1]); $i++)
        {
            $headersString .= $this->loaded_rows[1][$keys[$i]];
            if($i < count($this->loaded_rows[1]))
            {
                $headersString .= ",";
            }
        }
        return $headersString;
    }

    public function buildHierarchicArray($chartid)
    {
        $hierarchicArray = array();
        $total = 0;
        $previous = 0;

        switch($chartid)
        {
            case "hierarchicalbars":
            case "treemap":
            case "rttree":
            case "partitionedlayout":
            case "sunburst":
            case "sankey":
            {
                for($i = 0; $i < count($this->loaded_rows); $i++)
                {
                    $this->buildHierarchy($hierarchicArray, $this->loaded_rows[$i], 0, $total, $previous);
                }
            }
                break;

            case "bubbles":
            case "zoomablebubbles":
            {
                for($i = 2; $i < count($this->loaded_rows); $i++)
                {
                    $this->buildHierarchyBubble($hierarchicArray, $this->loaded_rows[$i], 0, $total, $previous);
                }
            }
        }

        $rootNode = array();
        $rootNode["name"] = "Total";
        $rootNode["value"] = $total;
        $rootNode["previous"] = $previous;

        switch($chartid)
        {
            case "bubbles":
            case "bubbleszoomable":
            {
                $rootNode["discount"] = $hierarchicArray[0]["discount"];
                $rootNode["margin"] = $hierarchicArray[0]["margin"];
            }
        }

        $rootNode["children"] = $hierarchicArray;

        return $rootNode;
    }

    /**
     * build the hierarchy according to the
     * columns passed as parameters
     * for json with "value" and "previous"
     */
    function buildHierarchy(&$hierarchy = array(), $row = array(), $depth, &$total, &$previousTotal)
    {
        $row_keys = array_keys($row);

        if($depth == (count($row) - 3))
        {
            $node = $this->searchKeyValue($hierarchy, $row[$row_keys[$depth]], "name" );
            //$node = -1;
            if($node < 0)
            {
                $item = array();
                $item["name"] = $row[$row_keys[$depth]];
                $item["value"] = ((strpos($row[$row_keys[$depth + 1]], '.') !== false)  ||  (strpos($row[$row_keys[$depth + 1]], ',') !== false)) ?
                    (float)($row[$row_keys[$depth + 1]]) : (int)($row[$row_keys[$depth + 1]]);
                $item["previous"] = ((strpos($row[$row_keys[$depth + 2]], '.') !== false)  ||  (strpos($row[$row_keys[$depth + 2]], ',') !== false)) ?
                    (float)($row[$row_keys[$depth + 2]]) : (int)($row[$row_keys[$depth + 2]]);
                array_push($hierarchy, $item);
            }
            else
            {
                $hierarchy[$node]["value"] += ((strpos($row[$row_keys[$depth + 1]], '.') !== false)  ||  (strpos($row[$row_keys[$depth + 1]], ',') !== false)) ?
                    (float)($row[$row_keys[$depth + 1]]) : (int)($row[$row_keys[$depth + 1]]);
                $hierarchy[$node]["previous"] += ((strpos($row[$row_keys[$depth + 2]], '.') !== false)  ||  (strpos($row[$row_keys[$depth + 2]], ',') !== false)) ?
                    (float)($row[$row_keys[$depth + 2]]) : (int)($row[$row_keys[$depth + 2]]);
            }

            return array($row[$row_keys[$depth + 1]], $row[$row_keys[$depth + 2]]);
        }
        else
        {
            $node = $this->searchKeyValue($hierarchy, $row[$row_keys[$depth]], "name" );
            if( $node < 0)
            {
                $node = count($hierarchy);
                $hierarchy[$node] = array();
                $hierarchy[$node]["name"] = $row[$row_keys[$depth]];
                $hierarchy[$node]["value"] = 0;
                $hierarchy[$node]["previous"] = 0;
                $hierarchy[$node]["children"] = array();
            }

            $returnArray = $this->buildHierarchy($hierarchy[$node]["children"], $row, $depth + 1);

            $hierarchy[$node]["value"] += $returnArray[0];
            $hierarchy[$node]["previous"] += $returnArray[1];

            $total += $returnArray[0];
            $previousTotal += $returnArray[1];

            return array($returnArray[0], $returnArray[1]);
        }
    }

    /**
     * build the hierarchy according to the
     * columns passed as parameters
     * for json with "value" and "previous"
     */
    function buildHierarchyBubble(&$hierarchy = array(), $row = array(), $depth, &$total, &$previousTotal)
    {
        $row_keys = array_keys($row);

        if($depth == (count($row) - 3))
        {
            $node = $this->searchKeyValue($hierarchy, $row[$row_keys[$depth]], "name" );
            //$node = -1;
            if($node < 0)
            {
                $item = array();
                $item["name"] = $row[$row_keys[$depth]];
                $item["value"] = ((strpos($row[$row_keys[$depth + 1]], '.') !== false)  ||  (strpos($row[$row_keys[$depth + 1]], ',') !== false)) ?
                    (float)($row[$row_keys[$depth + 1]]) : (int)($row[$row_keys[$depth + 1]]);
                $item["previous"] = ((strpos($row[$row_keys[$depth + 2]], '.') !== false)  ||  (strpos($row[$row_keys[$depth + 2]], ',') !== false)) ?
                    (float)($row[$row_keys[$depth + 2]]) : (int)($row[$row_keys[$depth + 2]]);
                $item["discount"] = ((strpos($row[$row_keys[$depth + 3]], '.') !== false)  ||  (strpos($row[$row_keys[$depth + 3]], ',') !== false)) ?
                    (float)($row[$row_keys[$depth + 3]]) : (int)($row[$row_keys[$depth + 3]]);
                $item["margin"] = ((strpos($row[$row_keys[$depth + 4]], '.') !== false)  ||  (strpos($row[$row_keys[$depth + 4]], ',') !== false)) ?
                    (float)($row[$row_keys[$depth + 4]]) : (int)($row[$row_keys[$depth + 4]]);
                array_push($hierarchy, $item);
            }
            else
            {
                $hierarchy[$node]["value"] += ((strpos($row[$row_keys[$depth + 1]], '.') !== false)  ||  (strpos($row[$row_keys[$depth + 1]], ',') !== false)) ?
                    (float)($row[$row_keys[$depth + 1]]) : (int)($row[$row_keys[$depth + 1]]);
                $hierarchy[$node]["previous"] += ((strpos($row[$row_keys[$depth + 2]], '.') !== false)  ||  (strpos($row[$row_keys[$depth + 2]], ',') !== false)) ?
                    (float)($row[$row_keys[$depth + 2]]) : (int)($row[$row_keys[$depth + 2]]);
                $hierarchy[$node]["discount"] = ((strpos($row[$row_keys[$depth + 3]], '.') !== false)  ||  (strpos($row[$row_keys[$depth + 3]], ',') !== false)) ?
                    (float)($row[$row_keys[$depth + 3]]) : (int)($row[$row_keys[$depth + 3]]);
                $hierarchy[$node]["margin"] = ((strpos($row[$row_keys[$depth + 4]], '.') !== false)  ||  (strpos($row[$row_keys[$depth + 4]], ',') !== false)) ?
                    (float)($row[$row_keys[$depth + 4]]) : (int)($row[$row_keys[$depth + 4]]);
            }

            return array($row[$row_keys[$depth + 1]], $row[$row_keys[$depth + 2]], $row[$row_keys[$depth + 3]], $row[$row_keys[$depth + 4]]);
        }
        else
        {
            $node = $this->searchKeyValue($hierarchy, $row[$row_keys[$depth]], "name" );
            if( $node < 0)
            {
                $node = count($hierarchy);
                $hierarchy[$node] = array();
                $hierarchy[$node]["name"] = $row[$row_keys[$depth]];
                $hierarchy[$node]["value"] = 0;
                $hierarchy[$node]["previous"] = 0;
                $hierarchy[$node]["discount"] = 0;
                $hierarchy[$node]["margin"] = 0;
                $hierarchy[$node]["children"] = array();
            }

            $returnArray = $this->buildHierarchyBubble($hierarchy[$node]["children"], $row, $depth + 1);

            $hierarchy[$node]["value"] += $returnArray[0];
            $hierarchy[$node]["previous"] += $returnArray[1];
            $hierarchy[$node]["discount"] = ((strpos($returnArray[2], '.') !== false)  ||  (strpos($returnArray[2], ',') !== false)) ?
                (float)($returnArray[2]) : (int)($returnArray[2]);
            $hierarchy[$node]["margin"] = ((strpos($returnArray[3], '.') !== false)  ||  (strpos($returnArray[3], ',') !== false)) ?
                (float)($returnArray[3]) : (int)($returnArray[3]);

            $total += $hierarchy[$node]["value"];
            $previousTotal += $hierarchy[$node]["previous"];

            return array($hierarchy[$node]["value"], $hierarchy[$node]["previous"], $hierarchy[$node]["discount"], $hierarchy[$node]["margin"]);
        }
    }

    /**
     * build csv string from xls content
     *
     *
     */

    function buildCSV()
    {
        $rows = count($this->loaded_rows);
        $cols = count($this->loaded_rows[1]);
        $colsname = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L',
            'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'X', 'Y', 'W', 'Z') ;
        $csv = "";

        for($rowcount = 0; $rowcount < $rows; $rowcount++)
        {
            for($colcount = 0; $colcount < $cols; $colcount++)
            {
                if(isset($this->loaded_workbook_cells[$colsname[$colcount].($rowcount+1)]))
                {
                    $v = $this->loaded_workbook_cells[$colsname[$colcount].($rowcount+1)];
                    $csv .= $v;
                }
                else
                {
                    $csv .= '';
                }
                if($colcount == $cols - 1) {
                    $csv .= "\n";
                } else {
                    $csv .= ",";

                }
            }
        }
        return $csv;
    }

    /**
     * search for a key value in a list of associative arrays
     *
     *
     */

    function searchKeyValue($list = array(), $needle, $key)
    {
        for ($i = 0; $i < count($list); $i++)
        {
            if($list[$i][$key] === $needle)
            {
                return $i;
            }
        }
        return -1;
    }

    public function clear_data()
    {
        $this->loaded_rows = null;
        $this->loaded_data = null;
    }


} 