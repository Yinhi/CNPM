<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	class donhang
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		//Thêm đơn hàng
		public function themDonHang($data){
			$MDH = mysqli_real_escape_string($this->db->link, $data['MDH']);
			$MKH = mysqli_real_escape_string($this->db->link, $data['MKH']);
			$NGAY_TAO_DON = mysqli_real_escape_string($this->db->link, $data['NGAY_TAO_DON']);
			$DIA_CHI_GIAO_HANG = mysqli_real_escape_string($this->db->link, $data['DIA_CHI_GIAO_HANG']);
			$HINH_THUC_THANH_TOAN = mysqli_real_escape_string($this->db->link, $data['HINH_THUC_THANH_TOAN']);
            $TRANG_THAI = mysqli_real_escape_string($this->db->link, $data['TRANG_THAI']);
            $TONG_SO_LUONG = mysqli_real_escape_string($this->db->link, $data['TONG_SO_LUONG']);
            $TONG_TIEN = mysqli_real_escape_string($this->db->link, $data['TONG_TIEN']);

			if($MDH=="" || $MKH=="" || $NGAY_TAO_DON=="" || $DIA_CHI_GIAO_HANG=="" || $HINH_THUC_THANH_TOAN=="" || $TRANG_THAI=="" || $TONG_SO_LUONG=="" || $TONG_TIEN==""){
				$alert = "Các trường không được để trống";
				return $alert;
			}					
				else{
					$query = "INSERT INTO don_hang(MDH,MKH,NGAY_TAO_DON,DIA_CHI_GIAO_HANG,HINH_THUC_THANH_TOAN,TRANG_THAI,TONG_SO_LUONG,TONG_TIEN) 
							  VALUES('$MDH','$MKH','$NGAY_TAO_DON','$DIA_CHI_GIAO_HANG','$HINH_THUC_THANH_TOAN','$TRANG_THAI','$TONG_SO_LUONG','$TONG_TIEN')";
					
				}
				$result = $this->db->insert($query);
					if($result){
						$alert = "Thêm đơn hàng thành công";
						return $alert;
					}else{
						$alert = "Thêm đơn hàng không thành công";
						return $alert;
					}				
			}
		
        //Cập nhật đơn hàng
		public function capnhatDonHang($data,$MDH){
			$MDH = mysqli_real_escape_string($this->db->link, $data['MDH']);
			$MKH = mysqli_real_escape_string($this->db->link, $data['MKH']);
			$NGAY_TAO_DON = mysqli_real_escape_string($this->db->link, $data['NGAY_TAO_DON']);
			$DIA_CHI_GIAO_HANG = mysqli_real_escape_string($this->db->link, $data['DIA_CHI_GIAO_HANG']);
			$HINH_THUC_THANH_TOAN = mysqli_real_escape_string($this->db->link, $data['HINH_THUC_THANH_TOAN']);
            $TRANG_THAI = mysqli_real_escape_string($this->db->link, $data['TRANG_THAI']);
            $TONG_SO_LUONG = mysqli_real_escape_string($this->db->link, $data['TONG_SO_LUONG']);
            $TONG_TIEN = mysqli_real_escape_string($this->db->link, $data['TONG_TIEN']);

			if($MDH=="" || $MKH=="" || $NGAY_TAO_DON=="" || $DIA_CHI_GIAO_HANG=="" || $HINH_THUC_THANH_TOAN=="" || $TRANG_THAI=="" || $TONG_SO_LUONG=="" || $TONG_TIEN==""){
				$alert = "Các trường không được để trống";
				return $alert;
			}					
				else{
					$query = "UPDATE don_hang SET

                    MDH = '$MDH',
					MKH = '$MKH',
					NGAY_TAO_DON = '$NGAY_TAO_DON', 
					DIA_CHI_GIAO_HANG = '$DIA_CHI_GIAO_HANG', 
                    HINH_THUC_THANH_TOAN = '$HINH_THUC_THANH_TOAN',
                    TRANG_THAI = '$TRANG_THAI',
					TONG_SO_LUONG = '$TONG_SO_LUONG', 
                    TONG_TIEN = '$TONG_TIEN'
			
					WHERE MDH = '$MDH'";
					
				}
				$result = $this->db->update($query);
					if($result){
						$alert = "Cập nhật đơn hàng thành công";
						return $alert;
					}else{
						$alert = "Cập nhật đơn hàng không thành công";
						return $alert;
					}				
			}
		
        //Xóa đơn hàng
		public function huyDonHang($MDH){
			$query = "DELETE FROM don_hang where MDH = '$MDH'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "Xóa đơn hàng thành công";
				return $alert;
			}else{
				$alert = "Xóa đơn hàng không thành công";
				return $alert;
			}
			
		}

        //Lấy đơn hàng theo mã đơn hàng
		public function getByMDH($MDH){
			$query = "SELECT * FROM don_hang where MDH = '$MDH'";
			$result = $this->db->select($query);
			return $result;
		}
		
        //Lấy tất cả đơn hàng
		public function getAll(){
			$query = "SELECT * FROM don_hang";
			$result = $this->db->select($query);
			return $result;
		} 

        //xử lý đơn hàng
        public function xulyDonHang(){
            //code
        }

        //thu hồi đơn hàng
        public function thuhoiDonHang(){
            //code
        }
	}
?>