SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';


-- -----------------------------------------------------
-- Table ban
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS ban (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `ten` VARCHAR(255) NULL DEFAULT NULL ,
  `mo_ta` TEXT NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `update_at` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'ban nganh';


-- -----------------------------------------------------
-- Table chuc_vu_doan
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS chuc_vu_doan (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `ten` VARCHAR(255) NULL DEFAULT NULL ,
  `loai_don_vi` INT(11) NULL DEFAULT NULL ,
  `mo_ta` TEXT NULL DEFAULT NULL ,
  `quan_ly_don_vi_doan` TINYINT(1) NULL DEFAULT NULL ,
  `quan_ly_doan_vien` TINYINT(1) NULL DEFAULT NULL ,
  `quan_ly_can_bo` TINYINT(1) NULL DEFAULT NULL ,
  `danh_gia_xep_loai_doan_vien` TINYINT(1) NULL DEFAULT NULL ,
  `danh_gia_xep_loai_can_bo` TINYINT(1) NULL DEFAULT NULL ,
  `thay_doi_chuc_vu` TINYINT(1) NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `update_at` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table dan_toc
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS dan_toc (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `ten` VARCHAR(255) NULL DEFAULT NULL ,
  `mo_ta` TEXT NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `update_at` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table danh_gia_doan_vien
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS danh_gia_doan_vien (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `doan_vien_id` INT(11) NULL DEFAULT NULL ,
  `tieu_chi_id` INT(11) NULL DEFAULT NULL ,
  `diem` INT(11) NULL DEFAULT NULL ,
  `xep_loai` INT(11) NULL DEFAULT NULL ,
  `danh_gia_cua_doan_vien` TEXT NULL DEFAULT NULL ,
  `danh_gia_cua_chi_doan` TEXT NULL DEFAULT NULL ,
  `ghi_chu` TEXT NULL DEFAULT NULL ,
  `can_bo_danh_gia_id` INT(11) NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `update_at` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table danh_hieu
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS danh_hieu (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `ten` VARCHAR(255) NULL DEFAULT NULL ,
  `mo_ta` TEXT NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `update_at` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table dia_chi_day_du
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS dia_chi_day_du (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `xa_id` INT(11) NULL DEFAULT NULL ,
  `dia_chi` TEXT NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `update_at` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table doan_vien
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS doan_vien (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `ma_doan_vien` VARCHAR(255) NULL DEFAULT NULL ,
  `ten` VARCHAR(255) NULL DEFAULT NULL ,
  `ho_ten_dem` VARCHAR(255) NULL DEFAULT NULL ,
  `bi_danh` VARCHAR(255) NULL DEFAULT NULL ,
  `gioi_tinh` TINYINT(1) NULL DEFAULT NULL ,
  `ngay_sinh` DATE NULL DEFAULT NULL ,
  `que_quan` INT(11) NULL DEFAULT NULL ,
  `ho_khau_thuong_tru` INT(11) NULL DEFAULT NULL ,
  `ho_khau_tam_tru` INT(11) NULL DEFAULT NULL ,
  `email` VARCHAR(255) NULL DEFAULT NULL ,
  `dien_thoai` VARCHAR(255) NULL DEFAULT NULL ,
  `dan_toc_id` INT(11) NULL DEFAULT NULL ,
  `ton_giao_id` INT(11) NULL DEFAULT NULL ,
  `thanh_phan_gia_dinh_xuat_than` VARCHAR(255) NULL DEFAULT NULL ,
  `nghe_nghiep_id` INT(11) NULL DEFAULT NULL ,
  `mo_ta_cong_viec` TEXT NULL DEFAULT NULL ,
  `trinh_do_van_hoa` INT(2) NULL DEFAULT NULL ,
  `bang_cap_1` VARCHAR(255) NULL DEFAULT NULL ,
  `bang_cap_2` VARCHAR(255) NULL DEFAULT NULL ,
  `ky_nang_ngoai_ngu_id` INT(11) NULL DEFAULT NULL ,
  `ky_nang_tin_hoc_id` INT(11) NULL DEFAULT NULL ,
  `tinh_trang_suc_khoe` INT(11) NULL DEFAULT NULL ,
  `ngay_vao_doan` DATE NULL DEFAULT NULL ,
  `CMTND` VARCHAR(255) NULL DEFAULT NULL ,
  `ngay_cap` DATE NULL DEFAULT NULL ,
  `noi_cap` INT(11) NULL DEFAULT NULL ,
  `danh_hieu_id` INT(11) NULL DEFAULT NULL ,
  `ly_luan_chinh_tri_id` INT(11) NULL DEFAULT NULL ,
  `ban_id` INT(11) NULL DEFAULT NULL ,
  `chuc_vu_doan_id` INT(11) NULL DEFAULT NULL ,
  `trang_thai` INT(11) NULL DEFAULT NULL ,
  `don_vi_id` INT(11) NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `update_at` DATETIME NULL DEFAULT NULL ,
  `deleted_at` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table doan_vien_di_chuyen
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS doan_vien_di_chuyen (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `doan_vien_id` INT(11) NULL DEFAULT NULL ,
  `don_vi_di_id` INT(11) NULL DEFAULT NULL ,
  `don_vi_den_id` INT(11) NULL DEFAULT NULL ,
  `nguyen_nhan` TEXT NULL DEFAULT NULL ,
  `ngay_di_chuyen` DATE NULL DEFAULT NULL ,
  `ghi_chu` TEXT NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `update_at` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table don_vi
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS don_vi (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `ma_don_vi` VARCHAR(255) NULL DEFAULT NULL ,
  `ten` VARCHAR(255) NULL DEFAULT NULL ,
  `tinh_id` INT(11) NULL DEFAULT NULL ,
  `huyen_id` INT(11) NULL DEFAULT NULL ,
  `xa_id` INT(11) NULL DEFAULT NULL ,
  `dia_chi` VARCHAR(255) NULL DEFAULT NULL ,
  `dien_thoai_ban` VARCHAR(255) NULL DEFAULT NULL ,
  `dien_thoai` VARCHAR(255) NULL DEFAULT NULL ,
  `fax` VARCHAR(255) NULL DEFAULT NULL ,
  `lanh_dao` VARCHAR(255) NULL DEFAULT NULL ,
  `email` VARCHAR(255) NULL DEFAULT NULL ,
  `website` VARCHAR(255) NULL DEFAULT NULL ,
  `loai_don_vi` INT(11) NULL DEFAULT NULL ,
  `don_vi_truc_thuoc_id` INT(11) NULL DEFAULT NULL ,
  `tinh_trang` INT(1) NULL DEFAULT NULL ,
  `ngay_thanh_lap` DATE NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `update_at` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = ' (co so Doan) co the la co so Doan cua quan huyen, xa phuong';


-- -----------------------------------------------------
-- Table huyen
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS huyen (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `tinh_id` INT(11) NULL DEFAULT NULL ,
  `ten` VARCHAR(255) NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `update_at` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table ky_nang_ngoai_ngu
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS ky_nang_ngoai_ngu (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `ten` VARCHAR(255) NULL DEFAULT NULL ,
  `mo_ta` TEXT NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `update_at` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table ky_nang_tin_hoc
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS ky_nang_tin_hoc (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `ten` VARCHAR(255) NULL DEFAULT NULL ,
  `mo_ta` TEXT NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `update_at` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table ly_luan_chinh_tri
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS ly_luan_chinh_tri (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `ten` VARCHAR(255) NULL DEFAULT NULL ,
  `mo_ta` TEXT NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `update_at` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = ' (ly luan chinh tri)';


-- -----------------------------------------------------
-- Table nghe_nghiep
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS nghe_nghiep (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `ten` VARCHAR(255) NULL DEFAULT NULL ,
  `mo_ta` TEXT NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `update_at` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table tieu_chi
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS tieu_chi (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `ten` TEXT NULL DEFAULT NULL ,
  `mo_ta` TEXT NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `update_at` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table tinh
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS tinh (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `ten` VARCHAR(255) NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `update_at` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table ton_giao
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS ton_giao (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `ten` VARCHAR(255) NULL DEFAULT NULL ,
  `mo_ta` TEXT NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `update_at` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table user
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS user (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(255) NULL DEFAULT NULL ,
  `password` VARCHAR(255) NULL DEFAULT NULL ,
  `ten_hien_thi` VARCHAR(255) NULL DEFAULT NULL ,
  `email` VARCHAR(255) NULL DEFAULT NULL ,
  `doan_vien_id` INT(11) NULL DEFAULT NULL ,
  `ma_bi_mat` VARCHAR(255) NULL DEFAULT NULL,
  `ten_can_bo` VARCHAR(255) NULL DEFAULT NULL ,
  `admin` TINYINT(1) NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `update_at` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'admin va cac tai khoan quan ly cua cac co so Doan';


-- -----------------------------------------------------
-- Table xa
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS xa (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `huyen_id` INT(11) NULL DEFAULT NULL ,
  `ten` VARCHAR(255) NULL DEFAULT NULL ,
  `created_at` DATETIME NULL DEFAULT NULL ,
  `update_at` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
