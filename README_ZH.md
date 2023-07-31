# CSC348B项目

[English](https://github.com/HtmlIsTheBestProgrammingLanaguage/myFirstApp/blob/main/README.md) | 简体中文

这个项目我用的就是它最开始的名字，就是Laravel新建项目时候的默认名字
因为我实在想不出到底该叫这个项目什么名字比较恰当
默认的或许就是一个不错的选择

## 项目简介

本项目是使用 [Laravel](https://laravel.com)框架开发一个 个人信息发布平台，平台允许用户发布信息或者浏览其他用户发布的信息并与之交互
本项目完成于2023年5月2日，作为CSC348B的课程作业交给了斯旺西大学
**请勿将本项目中的任何代码用于您个人作业或学术报告**

## 项目功能

- 允许用户注册和登录，虽然使用了Laravel提供的登录接口，但是我自己重写了登录和注册页面
- 多用户等级，添加游客，注册用户，管理员3种用户等级
- 当点击用户头像的时候，会跳转到用户介绍页面。介绍页面会显示用户发布的post和发表的评论
- 允许用户删除和编辑他们自己的post和评论，管理员可以删除所有用户的任意一个post和评论
- 使用 Facker 创建了随机数据，比如随机文字，随机用户名和随机邮箱等用于测试
- 使用了Laravel自带的关系型数据库，并且正确设置了表格之间的关系
- 评论功能，允许登录用户给post发表评论
- 使用了AJAX在发布评论功能上，用户不需要刷新页面就可以发布评论
- 使用了CSS样式以提高用户体验
- 在点赞功能上使用了JavaScript，异步加载当前post的点赞数量
- 使用Jetty搭建了一个简单的API提供工具，提供post 的like数量的API接口 
- 提醒系统，当用户发布的post被其他用户评论了，发布post的用户就会收到提醒
- 使用Laravel自带的文件上传服务器实现了图片上传，允许用户给他们的post上传图片，其他用户在查看post的时候可以看到图片

## 项目Demo

### 项目视频

你可以在文件主目录下的/myFirstApp/blob/main/demo/2131205.mp4 找到视频文件

### 项目图片

![](https://github.com/HtmlIsTheBestProgrammingLanaguage/myFirstApp/blob/main/demo/ScreenCapture.png)
![](https://github.com/HtmlIsTheBestProgrammingLanaguage/myFirstApp/blob/main/demo/ScreenCapture%201.png)
![](https://github.com/HtmlIsTheBestProgrammingLanaguage/myFirstApp/blob/main/demo/ScreenCapture%202.png)
![](https://github.com/HtmlIsTheBestProgrammingLanaguage/myFirstApp/blob/main/demo/ScreenCapture%203.png)
![](https://github.com/HtmlIsTheBestProgrammingLanaguage/myFirstApp/blob/main/demo/ScreenCapture%204.png)
![](https://github.com/HtmlIsTheBestProgrammingLanaguage/myFirstApp/blob/main/demo/ScreenCapture%205.png)
![](https://github.com/HtmlIsTheBestProgrammingLanaguage/myFirstApp/blob/main/demo/ScreenCapture%206.png)
![](https://github.com/HtmlIsTheBestProgrammingLanaguage/myFirstApp/blob/main/demo/ScreenCapture%207.png)
![](https://github.com/HtmlIsTheBestProgrammingLanaguage/myFirstApp/blob/main/demo/ScreenCapture%208.png)
![](https://github.com/HtmlIsTheBestProgrammingLanaguage/myFirstApp/blob/main/demo/ScreenCapture%209.png)
![](https://github.com/HtmlIsTheBestProgrammingLanaguage/myFirstApp/blob/main/demo/ScreenCapture%210.png)
