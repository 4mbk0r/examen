<?php




    $link = mysqli_connect("localhost", "root", "");

    mysqli_select_db($link, "academico");

    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes

    $result = mysqli_query($link, 
    "SELECT 
            sum( if( i.departamento = 'lp', 1, 0 ) ) AS LP,
            sum( if( i.departamento = 'cb', 1, 0 ) ) AS CB, 
            sum( if( i.departamento = 'sc', 1, 0 ) ) AS SC,
            sum( if( i.departamento = 'OR', 1, 0 ) ) AS 'OR',  
            sum( if( i.departamento = 'PO', 1, 0 ) ) AS PO, 
            sum( if( i.departamento = 'PD', 1, 0 ) ) AS  PD,
            sum( if( i.departamento = 'BE', 1, 0 ) ) AS  BE,
            sum( if( i.departamento = 'TJ', 1, 0 ) ) AS  TJ,
            sum( if( i.departamento = 'CH', 1, 0 ) ) AS  CH
        
    FROM notas n, identificador i
    where n.ci=i.ci && n.nota>=51
    GROUP BY departamento");




    mysqli_data_seek ($result, 0);

    $dep =  ['LP','CB', 'SC', 'OR', 'PO', 'PD','BE', 'TJ', 'CH' ];

    
    $extraido= mysqli_fetch_array($result);
    


    echo "<table border=1>";
	echo "<caption>Titulo de la tabla</caption>";
        
    echo "<tr>";
    for ($i=0; $i <sizeof ($dep); $i++) { 
       
		echo "<th>$dep[$i]</th>";
    
    }
    echo "</tr>";
    echo "<tr>";
    for ($i=0; $i <sizeof ($dep); $i++) { 
       
        $x = $dep[$i];
		echo "<th>$extraido[$x]</th>";
    
    }
    echo "</tr>";
    
    echo "</table>";

?>