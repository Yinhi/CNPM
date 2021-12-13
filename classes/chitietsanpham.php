<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	class chitietsanpham
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		//thêm chi tiết sản phẩm
		public function themChiTietSanPham($data,$files){

			
			$MSP = mysqli_real_escape_string($this->db->link, $data['MSP']);
			$MCTSP = mysqli_real_escape_string($this->db->link, $data['MCTSP']);
			$SIZE = mysqli_real_escape_string($this->db->link, $data['SIZE']);
			$GIA_BAN = mysqli_real_escape_string($this->db->link, $data['GIA_BAN']);
			$GIA_NHAP = mysqli_real_escape_string($this->db->link, $data['GIA_NHAP']);
            $SO_LUONG = mysqli_real_escape_string($this->db->link, $data['SO_LUONG']);
            $MAU_SAC = mysqli_real_escape_string($this->db->link, $data['MAU_SAC']);

			//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');

			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			// $file_current = strtolower(current($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;
			
			if($MSP=="" || $MCTSP=="" || $SIZE=="" || $GIA_BAN=="" || $GIA_NHAP=="" || $SO_LUONG=="" || $MAU_SAC==""){
				$alert = "Các trường không được để trống";
				return $alert;
			}else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if ($file_size > 20480) {
		    		    $alert = "Kích cỡ ảnh phải nhỏ hơn 2MB";
					    return $alert;
				    } 
					elseif (in_array($file_ext, $permited) == false) 
					{
				        $alert = "Hình ảnh phải có định dạng:-".implode(', ', $permited)." ";
					    return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "INSERT INTO chi_tiet_san_pham(MSP,MCTSP,SIZE,GIA_BAN,GIA_NHAP,SO_LUONG,MAU_SAC,ANH) 
							  VALUES('$MSP','$MCTSP','$SIZE','$GIA_BAN','$GIA_NHAP','$SO_LUONG','$MAU_SAC','$unique_image')";
					
				}else{
					//Nếu người dùng không chọn ảnh
					$query = "INSERT INTO chi_tiet_san_pham(MSP,MCTSP,SIZE,GIA_BAN,GIA_NHAP,SO_LUONG,MAU_SAC) 
							  VALUES('$MSP','$MCTSP','$SIZE','$GIA_BAN','$GIA_NHAP','$SO_LUONG','$MAU_SAC')";
					
				}
				$result = $this->db->insert($query);
					if($result){
						$alert = "Thêm chi tiết sản phẩm thành công";
						return $alert;
					}else{
						$alert = "Thêm chi tiết sản phẩm không thành công";
						return $alert;
					}
				
			}
		}
		
        //Cập nhật chi tiết sản phẩm
		public function suaChiTietSanPham($data,$files,$MCTSP){
			$MSP = mysqli_real_escape_string($this->db->link, $data['MSP']);
			$MCTSP = mysqli_real_escape_string($this->db->link, $data['MCTSP']);
			$SIZE = mysqli_real_escape_string($this->db->link, $data['SIZE']);
			$GIA_BAN = mysqli_real_escape_string($this->db->link, $data['GIA_BAN']);
			$GIA_NHAP = mysqli_real_escape_string($this->db->link, $data['GIA_NHAP']);
            $SO_LUONG = mysqli_real_escape_string($this->db->link, $data['SO_LUONG']);
            $MAU_SAC = mysqli_real_escape_string($this->db->link, $data['MAU_SAC']);

			//Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited  = array('jpg', 'jpeg', 'png', 'gif');

			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];

			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			// $file_current = strtolower(current($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;


			if($MSP=="" || $MCTSP=="" || $SIZE=="" || $GIA_BAN=="" || $GIA_NHAP=="" || $SO_LUONG=="" || $MAU_SAC==""){
				$alert = "Các trường không được để trống";
				return $alert;
			}else{
				if(!empty($file_name)){
					//Nếu người dùng chọn ảnh
					if ($file_size > 20480) {
		    		    $alert = "Kích cỡ ảnh phải nhỏ hơn 2MB";
					    return $alert;
				    } 
					elseif (in_array($file_ext, $permited) == false) 
					{
				        $alert = "Hình ảnh phải có định dạng:-".implode(', ', $permited)." ";
					    return $alert;
					}
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "UPDATE chi_tiet_san_pham SET

					MSP = '$MSP',
					MCTSP = '$MCTSP',
					SIZE = '$SIZE', 
					GIA_BAN = '$GIA_BAN', 
					GIA_NHAP = '$GIA_NHAP', 
                    SO_LUONG = '$SO_LUONG',
                    MAU_SAC = '$MAU_SAC',
					ANH = '$unique_image'
			
					WHERE MCTSP = '$MCTSP'";
					
				}else{
					//Nếu người dùng không chọn ảnh
					$query = "UPDATE chi_tiet_san_pham SET

                    MSP = '$MSP',
					MCTSP = '$MCTSP',
					SIZE = '$SIZE', 
					GIA_BAN = '$GIA_BAN', 
					GIA_NHAP = '$GIA_NHAP', 
                    SO_LUONG = '$SO_LUONG',
                    MAU_SAC = '$MAU_SAC'
					
					WHERE MCTSP = '$MCTSP'";
					
				}
				$result = $this->db->update($query);
					if($result){
						$alert = "Cập nhật chi tiết sản phẩm thành công";
						return $alert;
					}else{
						$alert = "Cập nhật chi tiết sản phẩm không thành công";
						return $alert;
					}
				
			}

		}

        //Xóa chi tiết sản phẩm
		public function xoaChiTietSanPham($MCTSP){
			$query = "DELETE FROM chi_tiet_san_pham where MCTSP = '$MCTSP'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "Xóa chi tiết sản phẩm thành công";
				return $alert;
			}else{
				$alert = "Xóa chi tiết sản phẩm không thành công";
				return $alert;
			}
			
		}

        //Lấy chi tiết sản phẩm theo mã chi tiết sản phẩm
		public function getByMCTSP($MCTSP){
			$query = "SELECT * FROM chi_tiet_san_pham where MCTSP = '$MCTSP'";
			$result = $this->db->select($query);
			return $result;
		}
		
        //Lấy tất cả chi tiết sản phẩm
		public function getAll(){
			$query = "SELECT * FROM chi_tiet_san_pham";
			$result = $this->db->select($query);
			return $result;
		} 

        //Thêm số lượng
        public function themSL(){
            //code
        }

        //Thêm số lượng
        public function giamSL(){
            //code
        }
	}
?>