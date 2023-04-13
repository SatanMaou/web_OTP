Dự án OTP: sử dụng mã OTP xác nhận thông tin để đăng nhập

- Giới thiệu:
Dự án dùng Mã Y Tế và số điện thoại mà bệnh nhân cung cấp sẽ được kiểm tra đến dữ liệu được lưu trữ từ trước trong cơ sở dữ liệu. Sau khi kiểm tra và xác nhận đã có trên cơ sở dữ liệu thì sẽ gửi mã otp cho người dùng. Còn nếu không thì sẽ gửi lại là chưa có mã y tế

- Cách sử dụng:
Vào trang đăng nhập của y tế, nhập thông tin vào trong form bao gồm mã y tế và số điện thoại đã đăng kí rồi bấm đăng nhập. Nếu đã đăng kí thì sẽ qua trang có form nhập mã OTP đễ bảo mật và xác nhận chủ sở hữu đang đăng nhập. từ 1-60s sẽ nhận được tin nhắn OTP đến số điện thoại. Nhập số OTP mới gửi và bấm xác nhận. Đã hoàn thành các bước đăng nhập và dùng mã OTP để xác nhận

- Hướng dựng sửa web:
    - Đường dẫn: (SQL, config):
        - Path file (*.sql): ./SQL/Otp_yte.sql
        - Path file (config.php): ./php/config.php

- Thủ tục trong database:
# <copy> dùng để tự động đổi mã OTP sau 1h:
DELIMITER $$

DROP PROCEDURE IF EXISTS loopOTP$$

CREATE PROCEDURE loopOTP()
BEGIN     
        WHILE (TRUE) DO
            UPDATE `otp` SET `MaOTP` = FLOOR(1000 + RAND()*(9999-1000));
            DO SLEEP(3600);
        END WHILE;
END$$

DELIMITER ;

CALL loopOTP();
# </copy>

- Dự án được xây dụng và hoàn thành bỡi công ty Tech For Business (TFB) và nhóm support OkNguyen