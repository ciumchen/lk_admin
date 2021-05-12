<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>测试图片上传</title>
</head>
<body>
<h1>图片上传测试</h1>
<form action="/admin/uploadImg" method="post" enctype="multipart/form-data">
    <label for="file">文件名：</label>
    <input type="file" name="file" id="file"><br><hr/>
    <input type="submit" name="submit" value="提交">
</form>



</body>
</html>
