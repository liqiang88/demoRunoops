<?php
session_start();
$admin = isset($_SESSION['admin']) ? $_SESSION['admin'] : '';

if($admin != 1){
    $username = isset($_GET['username']) ? $_GET['username'] : '';
    $pwd = isset($_GET['pwd']) ? $_GET['pwd'] : '';

    if($username == 'admin123456' && $pwd == 'admin123456ABC123456991'){
        $_SESSION['admin'] = 1;
    }else {
        die('授权失败');
    }
}


if($_POST){
    $data = $_POST;
    $dirName = isset($data['dirName']) ? $data['dirName'] : '';
    $fileName = isset($data['fileName']) ? $data['fileName'] : '';
    $textContent= isset($data['textContent']) ? $data['textContent'] : '';

    if(empty($dirName) || empty($fileName) || empty($textContent)){
        die('dirName or fileName or textContent is empty');
    }

    $sourcePath = dirname(__FILE__).'/sources/'.$dirName;

    if(!is_dir($sourcePath)){
        mkdir($sourcePath,0777);
    }


    $fileFullName = $sourcePath.'/'.$fileName.'.html';

    if(file_exists($fileFullName)){
        die($fileFullName.'-文件已存在');
    }


    file_put_contents($fileFullName,$textContent);

    $url = 'http://demo.runoops.com/try.php?file='.$dirName.'_'.$fileName;


}


$file = isset($_GET['file']) ? $_GET['file'] : '';

//echo $file;die;
if(strlen($file) > 100){
    die('请求不正确');
}


$subfix = '.html';
$filePath = '';
if($file){
    $fileArr = explode("_",$file);
    foreach ($fileArr as $key => $value) {
        $filePath .= $value;
        $filePath .= '/';
    }

    $filePath  = rtrim($filePath,'/');
    $filePath = 'sources'.'/'.$filePath.$subfix;
}

if (!file_exists($filePath)){
    die('File not fond');
}

$fileContent = file_get_contents($filePath);

$fileContent = isset($textContent) ? $textContent : $fileContent;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>自学教程 - 在线编辑器</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="//cdn.staticfile.org/codemirror/5.40.2/codemirror.min.js"></script>
    <link rel="stylesheet" href="//cdn.staticfile.org/codemirror/5.40.2/codemirror.min.css">
    <script src="//cdn.staticfile.org/codemirror/5.40.2/mode/htmlmixed/htmlmixed.min.js"></script>
    <script src="//cdn.staticfile.org/codemirror/5.40.2/mode/css/css.min.js"></script>
    <script src="//cdn.staticfile.org/codemirror/5.40.2/mode/javascript/javascript.min.js"></script>
    <script src="//cdn.staticfile.org/codemirror/5.40.2/mode/xml/xml.min.js"></script>
    <script src="//cdn.staticfile.org/codemirror/5.40.2/addon/edit/closetag.min.js"></script>
    <script src="//cdn.staticfile.org/codemirror/5.40.2/addon/edit/closebrackets.min.js"></script>
    <!--[if lt IE 9]>
    <script src="//cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <![endif]-->
</head>
<body>
<style type="text/css">

    .container {
        width: 98%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto
    }

    @media screen and (max-width: 768px) {

        #textareaCode {
            height: 300px
        }

        .CodeMirror {
            height: 300px;
            font-family: Menlo, Monaco, Consolas, "Andale Mono", "lucida console", "Courier New", monospace;
        }

        #iframeResult {
            height: 300px
        }

        .form-inline {
            padding: 6px 0 2px 0
        }
    }

    #iframeResult {
        display: block;
        overflow: hidden;
        border: 0 !important;
        min-width: 100px;
        width: 100%;
        min-height: 300px;
        background-color: #fff
    }

</style>

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">在线编辑器</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">主页</a></li>
                <li class=""><a href="http://runoops.com/" target="_blank">自学教程</a></li>
                <!--                <li><a href="#about">About</a></li>-->
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">


    <div class="row">
        <?php echo isset($url) ? $url : '';?>
        <form class="form-inline" id="generateForm" method="post">
            <div class="col-xs-6">
                目录:<input type="text" id="dirName" name="dirName" value="<?php echo isset($dirName) ? $dirName : '';?>" />
                文件名:<input type="text" id="fileName" name="fileName" value="<?php echo isset($fileName) ? $fileName : '';?>"/>
                <input type="hidden" id="textContent" name="textContent" value="" />
                <button type="button" class="btn btn-success" id="submitGenerateBTN">生成文件
                </button>
            </div>
        </form>
    </div>


    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <form class="form-inline">
                        <div class="row">
                            <div class="col-xs-6">
                                <button type="button" onclick="resetCode()" class="btn btn-default">源代码
                                    <small>(<a class="text-danger"
                                               href="try.php?file=tryhtml_intro">显示异常</a>)
                                    </small>
                                    ：
                                </button>
                            </div>
                            <div class="col-xs-6 text-right">
                                <button type="button" class="btn btn-success" onclick="submitTryit()"
                                        id="submitBTN"><span class="glyphicon glyphicon-send"></span> 点击运行
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-body">
                    <textarea class="form-control" id="textareaCode" name="textareaCode"><?php echo $fileContent;?></textarea>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <form class="form-inline">
                        <button type="button" class="btn btn-default">运行结果</button>
                    </form>
                </div>
                <div class="panel-body">
                    <div id="iframewrapper"></div>
                </div>
            </div>
        </div>

    </div>
    <footer>
        <div class="row">
            <div class="col-sm-12">
                <div style="text-align: center;">
                    © 2020 自学教程  <a href="http://runoops.com" target="_blank">runoops.com</a> All Rights Reserved. 备案号：闽ICP备19010956号-1
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="/static/js/jquery3.5.min.js"></script>
<script>
    var mixedMode = {
        name: "htmlmixed",
        scriptTypes: [{matches: /\/x-handlebars-template|\/x-mustache/i,
            mode: null},
            {matches: /(text|application)\/(x-)?vb(a|script)/i,
                mode: "vbscript"}]
    };
    var editor = CodeMirror.fromTextArea(document.getElementById("textareaCode"), {
        mode: mixedMode,
        selectionPointer: true,
        lineNumbers: false,
        matchBrackets: true,
        indentUnit: 4,
        indentWithTabs: true
    });

    window.addEventListener("resize", autodivheight);

    var x = 0;
    function autodivheight(){
        var winHeight=0;
        if (window.innerHeight) {
            winHeight = window.innerHeight;
        } else if ((document.body) && (document.body.clientHeight)) {
            winHeight = document.body.clientHeight;
        }
        //通过深入Document内部对body进行检测，获取浏览器窗口高度
        if (document.documentElement && document.documentElement.clientHeight) {
            winHeight = document.documentElement.clientHeight;
        }
        height = winHeight*0.68
        editor.setSize('100%', height);
        document.getElementById("iframeResult").style.height= height +"px";
    }
    function resetCode() {
        var initCode = "<!DOCTYPE html>\n<html>\n<head>\n<meta charset=\"utf-8\">\n<title>\u81ea\u5b66\u6559\u7a0b(runoops.com)<\/title>\n<\/head>\n<body>\n\n<h1>\u6211\u7684\u7b2c\u4e00\u4e2a\u6807\u9898<\/h1>\n<p>\u6211\u7684\u7b2c\u4e00\u4e2a\u6bb5\u843d\u3002<\/p>\n\n<\/body>\n<\/html>"
        editor.getDoc().setValue(initCode);
        submitTryit();
    }
    function submitTryit() {
        var text = editor.getValue();
        var patternHtml = /<html[^>]*>((.|[\n\r])*)<\/html>/im
        var patternHead = /<head[^>]*>((.|[\n\r])*)<\/head>/im
        var array_matches_head = patternHead.exec(text);
        var patternBody = /<body[^>]*>((.|[\n\r])*)<\/body>/im;

        var array_matches_body = patternBody.exec(text);
        var basepath_flag = 1;
        var basepath = '';
        if(basepath_flag) {
            basepath = '<base href="//www.runoops.com/" target="_blank">';
        }
        if(array_matches_head) {
            text = text.replace('<head>', '<head>' + basepath );
        } else if (patternHtml) {
            text = text.replace('<html>', '<head>' + basepath + '</head>');
        } else if (array_matches_body) {
            text = text.replace('<body>', '<body>' + basepath );
        } else {
            text = basepath + text;
        }
        //console.log(text);
        var ifr = document.createElement("iframe");
        ifr.setAttribute("frameborder", "0");
        ifr.setAttribute("id", "iframeResult");
        document.getElementById("iframewrapper").innerHTML = "";
        document.getElementById("iframewrapper").appendChild(ifr);

        var ifrw = (ifr.contentWindow) ? ifr.contentWindow : (ifr.contentDocument.document) ? ifr.contentDocument.document : ifr.contentDocument;
        ifrw.document.open();
        ifrw.document.write(text);
        ifrw.document.close();
        autodivheight();
    }
    submitTryit();
    autodivheight();


    function submitGenerateIt() {
        var text = editor.getValue();
        var patternHtml = /<html[^>]*>((.|[\n\r])*)<\/html>/im
        var patternHead = /<head[^>]*>((.|[\n\r])*)<\/head>/im
        var array_matches_head = patternHead.exec(text);
        var patternBody = /<body[^>]*>((.|[\n\r])*)<\/body>/im;

        var array_matches_body = patternBody.exec(text);
        var basepath_flag = 1;
        var basepath = '';
        if(basepath_flag) {
            basepath = '<base href="//www.runoops.com/" target="_blank">';
        }
        if(array_matches_head) {
            text = text.replace('<head>', '<head>' + basepath );
        } else if (patternHtml) {
            text = text.replace('<html>', '<head>' + basepath + '</head>');
        } else if (array_matches_body) {
            text = text.replace('<body>', '<body>' + basepath );
        } else {
            text = basepath + text;
        }
        console.log(text);

        document.getElementById("textContent").value = text;
    }

    $(document).ready(function () {

        $('#submitGenerateBTN').click(function () {
            var text = editor.getValue();
            var patternHtml = /<html[^>]*>((.|[\n\r])*)<\/html>/im
            var patternHead = /<head[^>]*>((.|[\n\r])*)<\/head>/im
            var array_matches_head = patternHead.exec(text);
            var patternBody = /<body[^>]*>((.|[\n\r])*)<\/body>/im;

            var array_matches_body = patternBody.exec(text);
            var basepath_flag = 0;
            var basepath = '';
            if(basepath_flag) {
                basepath = '<base href="//runoops.com/" target="_blank">';
            }
            if(array_matches_head) {
                text = text.replace('<head>', '<head>' + basepath );
            } else if (patternHtml) {
                text = text.replace('<html>', '<head>' + basepath + '</head>');
            } else if (array_matches_body) {
                text = text.replace('<body>', '<body>' + basepath );
            } else {
                text = basepath + text;
            }

            $('#textContent').val(text);

            $('#generateForm').submit();

        });

    });
</script>
</body>
</html>