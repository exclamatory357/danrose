<?php

//session_start();

require('../../plugins/fpdf/fpdf.php');

include "../../config/db.php";



$fill = true;





$pdf = new FPDF('P','mm','LETTER');

//$pdf = new FPDF();



//set left margin

$pdf->SetTitle('Fully Paid Reciept',true);

$pdf->AddPage();



//$pdf->Image('../../dist/img/download.png', 8, 5, 23, 23, 'PNG', '');

//title header

$pdf->SetFont('Arial','B',16);

//set position from left

$pdf->SetX(60);

$pdf->Cell(90,13,'Fully Paid Reciept','','0','C');

$pdf->Ln();

$pdf->SetFont('Arial','',9);



$pdf->Ln();





//set margin left

$pdf->SetLeftMargin(10);



// Colors, line width and bold font

$pdf->SetFillColor(217, 217, 217);

$pdf->SetDrawColor(0);

$pdf->SetLineWidth(0);





if (isset($_GET["res-id"])) {

    $res_id = $_GET["res-id"];
    $total=0; $child=0;$adult=0;


        

		$sql = "SELECT * FROM

        reservation

        INNER JOIN `cottage/hall` ON `cottage/hall`.id = reservation.`cottage/hall_id`

        INNER JOIN `user` ON `user`.user_id = reservation.customer_id

        INNER JOIN user_type ON user_type.user_type_id = `user`.user_type_id WHERE `trans_no` = '$res_id'";

		$query = $con->query($sql);

        $query2 = $con->query($sql);



		$sql3 = "SELECT * FROM payment"; //query for payment

		$query3 = mysqli_query($con,$sql3);

		$fetch3 = mysqli_fetch_assoc($query3);

        $row2 = $query2->fetch_assoc();

		if ($query->num_rows > 0) {

            

            $pdf->SetFont('Arial','',10);

            $pdf->Cell(50,5,'Transaction no: '.$row2["trans_no"]);

            $pdf->Ln();



            $pdf->SetFont('Arial','',10);

            $pdf->Cell(50,5,'Name: '.$row2["fname"]." ".$row2["lname"]);

            $pdf->Ln();

            $pdf->Ln();



            $pdf->SetFont('Arial','B',10);

            $pdf->Cell(50,5,'Date of Reservation','1','0','L',$fill);

            $pdf->Cell(50,5,'Cottage/hall Name','1','0','L',$fill);

            $pdf->Cell(25,5,'Child','1','0','l',$fill);

			$pdf->Cell(25,5,'Adult','1','0','l',$fill);

            $pdf->Cell(50,5,'Ammount','1','0','C',$fill);

            $pdf->Ln();



			while ($row = $query->fetch_assoc()) {
				
				$total += $row["price"]; //adding all price

				$child += $row["child"];

				$adult += $row["adult"];

				$childPrice = $child * 25; //child price

				$adultPrice = $adult * 50; //adult price

				$totalPrice = $childPrice + $adultPrice + $total; //final price

				$half = $totalPrice; //holding the final price

				$downpayment = $half/2; //downpayment		

			//table row

			$pdf->SetFont('Arial','',10);

			$pdf->Cell(50,5,$row['date_reserve'],'1','0','L');

			$pdf->Cell(50,5,$row['name'],'1','0','L');

			$pdf->Cell(25,5,$row['child'],'1','0','l');

			$pdf->Cell(25,5,$row['adult'],'1','0','l');

			$pdf->Cell(50,5,number_format($row['price'],2),'1','0','R');

			$pdf->Ln();



			}

            //table row

			$pdf->SetFont('Arial','',10);

			$pdf->Cell(50,5,'','1','0','L');

			$pdf->Cell(50,5,'','1','0','L');

			$pdf->Cell(50,5,'Child ('.$child.'x 25):','1','0','R');

			$pdf->Cell(50,5,number_format($childPrice,2),'1','0','R');

			$pdf->Ln();

			//table row

			$pdf->SetFont('Arial','',10);

			$pdf->Cell(50,5,'','1','0','L');

			$pdf->Cell(50,5,'','1','0','L');

			$pdf->Cell(50,5,'Adult ('.$adult.'x 50):','1','0','R');

			$pdf->Cell(50,5,number_format($adultPrice,2),'1','0','R');

			$pdf->Ln();

            //table row

			$pdf->SetFont('Arial','',10);

			$pdf->Cell(50,5,'','1','0','L');

			$pdf->Cell(50,5,'','1','0','L');

			$pdf->Cell(50,5,'Subtotal(Fullypaid):','1','0','R');

			$pdf->Cell(50,5,number_format($totalPrice,2),'1','0','R');

			$pdf->Ln();

        
        }

		



   







}

$pdf->Output();

?>