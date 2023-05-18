<?php
	require_once ("../BackEnd/ConnectionDB/DB_classes.php");

	session_start();
	
	if (isset($_SESSION['currentUser'])) {
		$mahd = $_GET['mahd'];
	
		$sql="SELECT * FROM chitiethoadon WHERE MaHD=$mahd";
		
		$dscthd=(new DB_driver())->get_list($sql);
		
		for($i = 0; $i < sizeof($dscthd); $i++) {
            $dscthd[$i]["SP"] = (new SanPhamBUS())->select_by_id('*', $dscthd[$i]['MaSP']);
        }

		echo '<table class="table table-striped" >
		<tr style="text-align:center;vertical-align:middle;font-size:20px;background-color:coral;color:black!important">
			<th scope="col" style="font-weight:600">Product</th>
			<th scope="col" style="font-weight:600">Amount</th>
			<th scope="col" style="font-weight:600">Cost</th>
		</tr>';

		forEach($dscthd as $row) {

				echo '<tr>
					<td scope="col" style="text-align:center;vertical-align:middle;">
						<a href="chitietsanpham.php?'.$row['MaSP'].'">
							<img style="width:100px;height:100px;" src="'.$row["SP"]["HinhAnh"].'"><br>
							'.$row["SP"]["TenSP"].'
						</a>
					</td>
					<td scope="col" style="text-align:center;vertical-align:middle;">'.$row["SoLuong"].'</td>
					<td scope="col" style="text-align:center;vertical-align:middle;">'.$row["DonGia"].'</td>
				</tr>'	;	
		}
		echo   '</table>';
	}

	
// if (isset($_SESSION['currentUser'])) {
//     $mahd = $_GET['mahd'];
    
//     // Prepare the SQL statement with parameterized query
//     $sql = "SELECT * FROM chitiethoadon WHERE MaHD=?";
//     $stmt = (new DB_driver())->prepare($sql);
//     $stmt->bind_param('i', $mahd);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     $dscthd = $result->fetch_all(MYSQLI_ASSOC);

//     // Loop through each record in the $dscthd array and append the product info
//     $sanPhamBUS = new SanPhamBUS();
//     foreach ($dscthd as &$cthd) {
//         $cthd["SP"] = $sanPhamBUS->select_by_id('*', $cthd['MaSP']);
//     }

//     // Build the HTML table
//     $tableRows = '';
//     foreach ($dscthd as $cthd) {
//         $tableRows .= '
//             <tr>
//                 <td scope="col" style="text-align:center;vertical-align:middle;">
//                     <a href="chitietsanpham.php?' . $cthd['MaSP'] . '">
//                         <img style="width:100px;height:100px;" src="' . $cthd["SP"]["HinhAnh"] . '"><br>
//                         ' . $cthd["SP"]["TenSP"] . '
//                     </a>
//                 </td>
//                 <td scope="col" style="text-align:center;vertical-align:middle;">' . $cthd["SoLuong"] . '</td>
//                 <td scope="col" style="text-align:center;vertical-align:middle;">' . $cthd["DonGia"] . '</td>
//             </tr>';
//     }

//     // Display the HTML table
//     echo '
//         <table class="table table-striped">
//             <tr style="text-align:center;vertical-align:middle;font-size:20px;background-color:coral;color:black!important">
//                 <th scope="col" style="font-weight:600">Product</th>
//                 <th scope="col" style="font-weight:600">Amount</th>
//                 <th scope="col" style="font-weight:600">Cost</th>
//             </tr>
//             ' . $tableRows . '
//         </table>';
// }


?>		



