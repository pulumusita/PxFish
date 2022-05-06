## PxFish简介

plum_star_xss_fish 简称pxfish，一个php写的供xss演示的一套源码

起因：写XSS钓鱼那篇文章时，在GitHub上和其他地方搜了一下php写的钓鱼示例页面，没找到，只找到了一个python写的钓鱼示例页面，就是我文章用的那个页面，但是并无法进行后台xss弹窗，所以萌生了php写一个xss演示系统的念头，也是正在学习php，借着这个机会尝试一下，前端写的不是很好看，但是基本功能是可以实现的，代码还是很简单的

## 功能实现

简单的钓鱼功能，同时也可以后台进行弹窗xss等功能(已经经过测试)

受害者登录页面输入用户名和密码，点击登录后跳转到真正的登录界面，受害者以为外在原因导致跳转，但实际上用户名和密码已经被在后台的我们获取

前端页面不够完善，只是实现了一些基础功能，如果你想将这套源码实际使用，请将前端和后台完善一下。

## 源码架构

admin_login.php：登录页面

admin.php：后台界面

inc：数据库配置文件

index.php主页面

img：readme文件图片储存

function.php：检查后台登录界面cookie

## 数据库

### 数据库建立

mysql中新建一个数据库，名字随意，但是需要在其中创建两张表，一张users，里面储存的是后台登录的用户名和密码

**ps：username和password是必须的，level可以有也可以没有**

![](https://s1.ax1x.com/2022/05/06/OKkp4g.png)

该数据库中新建一张pxfish的表，表中包含以下图片中的数据，用来储存获取的username和password

![](https://s1.ax1x.com/2022/05/06/OKFzE8.png)

### 数据库配置

一共有两个文件，config.inc.php文件填写数据库相关信息；mysql.inc.php文件，检查数据库是否正确连接

![](https://s1.ax1x.com/2022/05/06/OKkSUS.png)

## 写在最后

如果对本项目有疑问，建议，或者项目对您造成了伤害，请第一时间联系我，万分感谢。

博客：https://plumstar.cn

邮箱：plum_star@126.com

