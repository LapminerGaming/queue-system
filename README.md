# Hệ thống hàng chờ
Các bệnh viện, công ty, và doanh nghiệp sử dụng hệ thống hàng chờ cho khách hàng để tăng hiệu suất và cải thiện trải nghiệm của khách hàng. Hệ thống hàng chờ giúp tổ chức và quản lý lượng khách đến, giảm thời gian chờ đợi, tăng tính tổ chức và hiệu suất hoạt động.
Hệ thống hàng chờ là một hệ thống tự động hoặc bán tự động được sử dụng để quản lý và điều phối dòng người hoặc dịch vụ trong một tổ chức, như bệnh viện, công ty, hoặc doanh nghiệp. Hệ thống này giúp tối ưu hóa thời gian chờ đợi của khách hàng hoặc bệnh nhân, tăng cường hiệu suất và sự tổ chức trong quá trình cung cấp dịch vụ.
# Cách hoạt động
Chúng ta cần 2 màn hình để sử dụng(Có thể dùng chung 1 máy tính , để ở chế độ Mở rộng cho 2 màn hình)<br />
1 màn hình sẽ ở index.php
![demo](https://i.upanh.org/2024/04/16/Screenshot_20240416-212155_Chromebee1b414b2611a09.jpeg)
- Khi khách hàng nhập thông tin thì những thông tin đó sẽ được lưu vào data.json
<br />
- Màn hình còn lại sẽ ở file show-queue.php để hiển thị hàng chờ
![demo](https://i.upanh.org/2024/04/16/Screenshot_20240416-212907_Chromecbac0c55dc0945eb.jpeg)
#### Ngoài ra còn có tiện ích cho admin(nhân viên) 
- File admin.php sẽ hiển thị danh sách hàng chờ và các tiện ích như gọi số thứ tự và xóa tên trong hàng chờ
![demo](https://upanh.org/image/Screenshot-20240416-212907-Chrome.j2aRcahttps://upanh.org/image/Screenshot-20240416-213235-Chrome.j2aFU9)
# Chú ý :
Không chỉnh sửa file data.json và audio.json vì nếu bạn chinh sửa file có thể gây ra lỗi

