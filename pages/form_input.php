<html>
	<head>
		<link rel="stylesheet" href="../jq_ui/js/jquery-ui-1.8.21.custom.css" type="text/css" />
		<script type="text/javascript" src="../jq_ui/js/jquery-1.10.2.js"></script>
		<script type="text/javascript" src="../jq_ui/js/jquery-ui.js"></script>
		<script type="text/javascript">
		</script>
	</head>
	
	<body>
		<table>
			<tr><h2>FORM INPUT SURAT TANDA TERIMA PENYERAHAN PRODUK</h2></tr>
			<form action="" method = "post" name "search">
				<tr><td><p>Nomor BPM</p></td><td> : <input type="text" id="search_bpm_number" name="search_bpm_number"></td><td><input type="submit" name="search" value="SEARCH"></td>
			</form>
		<?php
			if (isset($_POST['search']))
			{
				$search_bpm_number = $_POST['search_bpm_number'];
			}
		?>
			<form id="simpan_header_sttpp" name="simpan_header_sttpp" method="post" action="simpan_header_sttpp.php" style="margin-bottom: 16px">
				<td><select name = "select_bpm_number" id = "select_bpm_number">
		<?php
		if (isset($_POST['search']))
			{
				$search_bpm_number = $_POST['search_bpm_number'];
				if($search_bpm_number == "")
				{
					$bpm_item_list = mysql_query("SELECT DISTINCT bpm_number, bpm_date FROM bpm_item_list");
					while ($data_bpm_item_list = mysql_fetch_array($bpm_item_list))
					{
		?>
			
			<option value="<?php echo $data_bpm_item_list[0];?>"><?php echo $data_bpm_item_list[0];?></option>
		<?php			
					}		
				}
				else
				{
					$bpm_item_list = mysql_query("SELECT DISTINCT bpm_number, bpm_date FROM bpm_item_list WHERE bpm_number LIKE '%$search_bpm_number%'");
					$count_bpm_item_list = mysql_num_rows($bpm_item_list);
					if($count_bpm_item_list != 0)
					{
						while ($data_bpm_item_list = mysql_fetch_array($bpm_item_list))
						{
		?>
			<option value="<?php echo $data_bpm_item_list[0];?>"><?php echo $data_bpm_item_list[0];?></option>
		<?php				
						}			
					}
					else
					{
		?>				
			<option>Not Found!</option></select></td></tr>
			
		<?php			
					}
				}
			}
		?>
		
			<tr><td><p>Gedung</p></td><td> :
				<select id="location" name="location" onChange="getColumn(this)" >
				<?php			
				$location=mysql_query("SELECT * FROM location ORDER BY location_desc ASC"); 
				while ($data_location=mysql_fetch_array($location)){?>
				<option value="<?php echo $data_location[0];?>"><?php echo $data_location[1];?></option>
				<?php
				}
				?>
				</select>
				</td>
			</tr>
				
			<tr><td><p>Kolom</p></td><td> :
				<select id="column_code" name="column_code">
				<?php 
				$column=mysql_query("SELECT * FROM building");
				while ($data_column=mysql_fetch_array($column)){?>
				<option value="<?php echo $data_column[1]; ?>"><?php echo $data_column[0];?></option>
				<?php	}
				?>
				</select>
				</td>
			</tr>
			<tr><td><p>Car Number</p></td><td> :
				<input type="text" id="car_code" name="car_code"></td>
			</tr>
			<tr><td><p><input type="submit" name="submit" value="SAVE"/></td></p></tr>
		</table>
		</form>
		<?php ob_flush(); ?>
	</body>
</html>