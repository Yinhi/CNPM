<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	class danhmuc
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		//Thêm danh mục
		public function themDanhMuc($data){
			$MDM = mysqli_real_escape_string($this->db->link, $data['MDM']);
			$TEN_DANH_MUC = mysqli_real_escape_string($this->db->link, $data['TEN_DANH_MUC']);
			
			if($MDM=="" || $TEN_DANH_MUC==""){
				$alert = "Các trường không được để trống";
				return $alert;
			}					
				else{
					$query = "INSERT INTO danh_muc(MDM,TEN_DANH_MUC) 
							  VALUES('$MDM','$TEN_DANH_MUC')";
					
				}
				$result = $this->db->insert($query);
					if($result){
						$alert = "Thêm danh mục thành công ";
						return $alert;
					}else{
						$alert = "Thêm danh mục không thành công ";
						return $alert;
					}				
			}
		
        //Cập nhật danh mục
		public function suaDanhMuc($data,$MDM){
			$MDM = mysqli_real_escape_string($this->db->link, $data['MDM']);
			$TEN_DANH_MUC = mysqli_real_escape_string($this->db->link, $data['TEN_DANH_MUC']);
			
			if($MDM=="" || $TEN_DANH_MUC==""){
				$alert = "Các trường không được để trống";
				return $alert;
			}					
				else{
					$query = "UPDATE danh_muc SET

                    MDM = '$MDM',
					TEN_DANH_MUC = '$TEN_DANH_MUC'
					
					WHERE MDM = '$MDM'";
					
				}
				$result = $this->db->update($query);
					if($result){
						$alert = "Cập nhật danh mục thành công ";
						return $alert;
					}else{
						$alert = "Cập nhật danh mục không thành công ";
						return $alert;
					}				
			}
		
        //Xóa danh mục
		public function xoaDanhMuc($MDM){
			$query = "DELETE FROM danh_muc where MDM = '$MDM'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "Xóa danh mục thành công ";
				return $alert;
			}else{
				$alert = "Xóa danh mục không thành công ";
				return $alert;
			}
			
		}

        //Lấy danh mục theo mã danh mục
		public function getByMDM($MDM){
			$query = "SELECT * FROM danh_muc where MDM = '$MDM'";
			$result = $this->db->select($query);
			return $result;
		}
		
        //Lấy tất cả danh mục
		public function getAll(){
			$query = "SELECT * FROM danh_muc";
			$result = $this->db->select($query);
			return $result;
		} 
	}
?>