<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	class chucvu
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		//Thêm chức vụ
		public function themChucVu($data){
			$MCV = mysqli_real_escape_string($this->db->link, $data['MCV']);
			$TEN_CHUC_VU = mysqli_real_escape_string($this->db->link, $data['TEN_CHUC_VU']);
			
			if($MCV=="" || $TEN_CHUC_VU==""){
				$alert = "Các trường không được để trống";
				return $alert;
			}					
				else{
					$query = "INSERT INTO chuc_vu(MCV,TEN_CHUC_VU) 
							  VALUES('$MCV','$TEN_CHUC_VU')";
					
				}
				$result = $this->db->insert($query);
					if($result){
						$alert = "Thêm chức vụ thành công ";
						return $alert;
					}else{
						$alert = "Thêm chức vụ không thành công ";
						return $alert;
					}				
			}
		
        //Cập nhật chức vụ
		public function suaChucVu($data,$MCV){
			$MCV = mysqli_real_escape_string($this->db->link, $data['MCV']);
			$TEN_CHUC_VU = mysqli_real_escape_string($this->db->link, $data['TEN_CHUC_VU']);
			
			if($MCV=="" || $TEN_CHUC_VU==""){
				$alert = "Các trường không được để trống";
				return $alert;
			}					
				else{
					$query = "UPDATE chuc_vu SET

                    MCV = '$MCV',
					TEN_CHUC_VU = '$TEN_CHUC_VU'
					
					WHERE MCV = '$MCV'";
					
				}
				$result = $this->db->update($query);
					if($result){
						$alert = "Cập nhật chức vụ thành công ";
						return $alert;
					}else{
						$alert = "Cập nhật chức vụ không thành công ";
						return $alert;
					}				
			}
	
        //Xóa chức vụ
		public function xoaChucVu($MCV){
			$query = "DELETE FROM chuc_vu where MCV = '$MCV'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "Xóa chức vụ thành công ";
				return $alert;
			}else{
				$alert = "Xóa chức vụ không thành công ";
				return $alert;
			}
			
		}

        //Lấy chức vụ theo mã chức vụ
		public function getByMCV($MCV){
			$query = "SELECT * FROM chuc_vu where MCV = '$MCV'";
			$result = $this->db->select($query);
			return $result;
		}
		
        //Lấy tất cả chức vụ
		public function getAll(){
			$query = "SELECT * FROM chuc_vu";
			$result = $this->db->select($query);
			return $result;
		} 
	}
?>