PDO (PHP Data Objects), đây hoàn toàn không phải là một khái niệm mới nó được giới thiệu lần đầu tiên ở phiên bản PHP 5 mà hiện nay thì PHP 5 đang được sử dụng rất phổ biến. Vậy thì PDO là gì và nó hoạt động như thế nào?
- Dịch ra một cách trần trụi thì PDO (PHP Data Objects) là các đối tượng dữ liệu trong PHP, nói theo một cách khác là nó sẽ chuyển tất cả dữ liệu thành đối tượng. Đồng thời nó cũng cung cấp các phương thức để thao tác với cơ sở dữ liệu. Trong các hệ cơ sở dữ liệu được PDO hỗ trợ mình sẽ liệt kê một vài cái chúng ta thường hay gặp, nếu các bạn muốn tìm hiểu thêm thì có  thể vào trực tiếp trang php manual để xem tại đây. Còn mình sẽ liệt kê một số cái như sau:

- PDO vẫn có thể sử dụng Exception để xử lý các lỗi và lời khuyên là những thao tác nào liên quan đến PDO thì tốt nhất chúng ta nên đặt trong try/catch, giống đoạn kết nối DB phía trên của mình. Khi sử dụng Exception cần lưu ý những điều sau:


Xem chi tiết các ví dụ tại các file

mysql.php
oracle.php