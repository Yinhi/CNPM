<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	class chitietdonhang
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		//Thêm chi tiết đơn hàng
		public function themChiTietDonHang($data){
			$MDH = mysqli_real_escape_string($this->db->link, $data['MDH']);
			$MCTSP = mysqli_real_escape_string($this->db->link, $data['MCTSP']);
			
			if($MDH=="" || $MCTSP==""){
				$alert = "Các trường không được để trống";
				return $alert;
			}					
				else{
					$query = "INSERT INTO chi_tiet_don_hang(MDH,MCTSP) 
							  VALUES('$MDH','$MCTSP')";
					
				}
				$result = $this->db->insert($query);
					if($result){
						$alert = "Thêm chi tiết đơn hàng thành công ";
						return $alert;
					}else{
						$alert = "Thêm chi tiết đơn hàng không thành công ";
						return $alert;
					}				
			}
		
        //Xóa chi tiết đơn hàng
		public function xoaChiTietDonHang($MDH,$MCTSP){
			$query = "DELETE FROM hoa_don where MHD = '$MHD' and MCTSP = '$MCTSP'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "Xóa chi tiết đơn hàng thành công";
				return $alert;
			}else{
				$alert = "Xóa chi tiết đơn hàng không thành công";
				return $alert;
			}
			
		}
		
        //Lấy tất cả chi tiết đơn hàng
		public function getAll(){
			$query = "SELECT * FROM chi_tiet_don_hang";
			$result = $this->db->select($query);
			return $result;
		} 
	}
?>