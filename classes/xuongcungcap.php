<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	class xuongcungcap
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		//Thêm xưởng cung cấp
		public function themXuongCungCap($data){
			$MXCC = mysqli_real_escape_string($this->db->link, $data['MXCC']);
			$TEN = mysqli_real_escape_string($this->db->link, $data['TEN']);
			$SDT = mysqli_real_escape_string($this->db->link, $data['SDT']);
			$EMAIL = mysqli_real_escape_string($this->db->link, $data['EMAIL']);
			$DIA_CHI = mysqli_real_escape_string($this->db->link, $data['DIA_CHI']);
            
			if($MXCC=="" || $TEN=="" || $SDT=="" || $EMAIL=="" || $DIA_CHI==""){
				$alert = "Các trường không được để trống";
				return $alert;
			}					
				else{
					$query = "INSERT INTO xuong_cung_cap(MXCC,TEN,SDT,EMAIL,DIA_CHI) 
							  VALUES('$MXCC','$TEN','$SDT','$EMAIL','$DIA_CHI')";
					
				}
				$result = $this->db->insert($query);
					if($result){
						$alert = "Thêm xưởng cung cấp thành công ";
						return $alert;
					}else{
						$alert = "Thêm xưởng cung cấp không thành công ";
						return $alert;
					}				
			}
		
        //Cập nhật xưởng cung cấp
		public function suaXuongCungCap($data,$MXCC){
			$MXCC = mysqli_real_escape_string($this->db->link, $data['MXCC']);
			$TEN = mysqli_real_escape_string($this->db->link, $data['TEN']);
			$SDT = mysqli_real_escape_string($this->db->link, $data['SDT']);
			$EMAIL = mysqli_real_escape_string($this->db->link, $data['EMAIL']);
			$DIA_CHI = mysqli_real_escape_string($this->db->link, $data['DIA_CHI']);
            
			if($MXCC=="" || $TEN=="" || $SDT=="" || $EMAIL=="" || $DIA_CHI==""){
				$alert = "Các trường không được để trống";
				return $alert;
			}					
				else{
					$query = "UPDATE xuong_cung_cap SET

                    MXCC = '$MXCC',
					TEN = '$TEN',
					SDT = '$SDT', 
					EMAIL = '$EMAIL', 
                    DIA_CHI = '$DIA_CHI'
                    			
					WHERE MXCC = '$MXCC'";
					
				}
				$result = $this->db->update($query);
					if($result){
						$alert = "Cập nhật xưởng cung cấp thành công ";
						return $alert;
					}else{
						$alert = "Cập nhật xưởng cung cấp không thành công ";
						return $alert;
					}				
			}
		
        //Xóa xưởng cung cấp
		public function xoaXuongCungCap($MXCC){
			$query = "DELETE FROM xuong_cung_cap where MXCC = '$MXCC'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "Xóa xưởng cung cấp thành công ";
				return $alert;
			}else{
				$alert = "Xóa xưởng cung cấp không thành công ";
				return $alert;
			}
			
		}
		
        //Lấy tất cả xưởng cung cấp
		public function getAll(){
			$query = "SELECT * FROM xuong_cung_cap";
			$result = $this->db->select($query);
			return $result;
		} 
	}
?>