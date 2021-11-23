    <?php

class OutputData {

    function __construct() {
    }

    function createForm() {
        //todo
    }

    function createSelectBox() {
        //todo
        
    }

    function createTable($rows) {
        $html = '<table border="1">';
            $html .= '<tr>';
            		$html .= "<th>" . 'Datum' . "</th>";
                    $html .= "<th>" . 'aantal personen' . "</th>";
                    $html .= "<th>" . 'Naam reserveringshouder' . "</th>";
            $html .= "</tr>";
            	foreach($rows as $row){
            		$html .= '<tr>';
            				$html .= "<td>" . $row['date_time'] . "</td>";
                            $html .= "<td>" . $row['amount_people'] . "</td>";
                            $html .= "<td>" . $row['name'] . "</td>";

                        $html .= "<td>" . '<button><a href="controller/productsController.php?todo=delete&id=' .$row['id'] . '">' . 'Delete' . '</button' . "</td>";
                        $html .= "<td>" . '<button><a href="controller/productsController.php?todo=update&id=' .$row['id'] . '">' . 'Update' . '</button' . "</td>";
            		$html .= '</tr>';
            	}
        $html .= '</table>';

        return $html;
    }

    function createTable2($rows) {
        $html = '<table border="1">';
            $html .= '<tr>';
                foreach($rows[0] as $key => $value){
                    $html .= "<th>" . $key . "</th>";
                }
            $html .= "</tr>";
                foreach($rows as $row){
                    $html .= '<tr>';
                        foreach($row as $columns) {
                            $html .= "<td>" . $columns . "</td>";
                        }
                        $html .= "<td>" . '<button><a href="controller/productsController.php?todo=delete&id=' .$row['id'] . '">' . 'Delete' . '</button' . "</td>";
                        $html .= "<td>" . '<button><a href="controller/productsController.php?todo=updateform&id=' .$row['id'] . '">' . 'Update' . '</a></button' . "</td>";
                    $html .= '</tr>';
                }
        $html .= '</table>';

        return $html;
    }


    function __destruct() {
        //todo
    }
}

?>

<html>
            <div id='content'>
            </div>
</html>