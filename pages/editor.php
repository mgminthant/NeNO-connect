<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Editor</title>
    <link rel="stylesheet" href="../asset/bootstrap.min.css">
    <!-- CodeMirror CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/codemirror@5.65.5/lib/codemirror.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/codemirror@5.65.5/theme/monokai.min.css">
</head>

<?php include('../db/db.php'); ?>

<?php
if (isset($_POST['edit'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT * FROM `projects` WHERE `id`='$id'";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query Failed");
        } else {
            $row = mysqli_fetch_assoc($result);
            $escaped_html_code = htmlspecialchars($row['htmlcode'], ENT_QUOTES, 'UTF-8');
            $escaped_css_code = htmlspecialchars($row['csscode'], ENT_QUOTES, 'UTF-8');
            $escaped_js_code = htmlspecialchars($row['jscode'], ENT_QUOTES, 'UTF-8');
        }
    }
}
?>

<body>
    <div class="h-100">
        <div class="bg-black">
            <div class="row">
                <div class="col-md-4 text-center text-white">
                    <h5 class="py-1">HTML</h5>
                    <textarea id="html-editor"><?php echo $escaped_html_code; ?></textarea>
                </div>
                <div class="col-md-4 text-center text-white">
                    <h5 class="py-1">CSS</h5>
                    <textarea id="css-editor"><?php echo $escaped_css_code; ?></textarea>
                </div>
                <div class="col-md-4 text-center text-white">
                    <h5 class="py-1">JavaScript</h5>
                    <textarea id="js-editor"><?php echo $escaped_js_code; ?></textarea>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center px-4 py-2">
                <h5 class="text-white">Quanum<sub>Connect</sub></h5>
                    <div id="run-btn" style="cursor: pointer;"
                        class="cursor-pointer bg-primary py-1 rounded px-2 text-white text-decoration-none"
                        data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="run code">
                        run
                    </div>
            </div>
        </div>
        <div id="result" class="d-flex justify-content-center align-items-center bg-white py-2">
        </div>
    </div>

    <script src="../asset/popper.min.js"></script>
    <script src="../Js/poper.js"></script>
    <!-- CodeMirror JS -->
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.65.5/lib/codemirror.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.65.5/mode/htmlmixed/htmlmixed.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.65.5/mode/xml/xml.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.65.5/mode/javascript/javascript.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/codemirror@5.65.5/mode/css/css.min.js"></script>
    <!-- js-beautify -->
    <script src="https://cdn.jsdelivr.net/npm/js-beautify@1.14.0/js/lib/beautify.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-beautify@1.14.0/js/lib/beautify-html.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-beautify@1.14.0/js/lib/beautify-css.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-beautify@1.14.0/js/lib/beautify-js.js"></script>

    <script>
        // Function to unescape HTML entities
        function decodeHtml(html) {
            var txt = document.createElement('textarea');
            txt.innerHTML = html;
            return txt.value;
        }

        // Get the escaped HTML code and decode it
        var html_code = decodeHtml(`<?php echo $escaped_html_code; ?>`);
        var css_code = decodeHtml(`<?php echo $escaped_css_code; ?>`);
        var js_code = decodeHtml(`<?php echo $escaped_js_code; ?>`);

        // Beautify the HTML, CSS, and JS code
        html_code = html_beautify(html_code, {
            indent_size: 2,
            wrap_line_length: 80
        });

        css_code = css_beautify(css_code, {
            indent_size: 2,
            wrap_line_length: 80
        });

        js_code = js_beautify(js_code, {
            indent_size: 2,
            wrap_line_length: 80
        });

        // Initialize CodeMirror for HTML
        var htmlEditor = CodeMirror.fromTextArea(document.getElementById('html-editor'), {
            value: html_code,
            mode: 'htmlmixed',
            theme: 'monokai',
            lineNumbers: true,
            lineWrapping: true
        });

        // Initialize CodeMirror for CSS
        var cssEditor = CodeMirror.fromTextArea(document.getElementById('css-editor'), {
            value: css_code,
            mode: 'css',
            theme: 'monokai',
            lineNumbers: true,
            lineWrapping: true
        });

        // Initialize CodeMirror for JavaScript
        var jsEditor = CodeMirror.fromTextArea(document.getElementById('js-editor'), {
            value: js_code,
            mode: 'javascript',
            theme: 'monokai',
            lineNumbers: true,
            lineWrapping: true
        });

        // Function to run code and display result
        const runResult = () => {
            var html = htmlEditor.getValue();
            var css = cssEditor.getValue();
            var js = jsEditor.getValue();

            var resultFrame = document.getElementById('result');
            resultFrame.innerHTML = `
                <style>${css}</style>
                ${html}
                <script>${js}<\/script>
            `;
        }

        document.getElementById('run-btn').addEventListener('click', runResult);
        runResult();
    </script>