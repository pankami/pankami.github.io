<?php 
require_once 'process.php';

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
//echo get_client_ip();
if (get_client_ip() != '116.96.24.213') {
    die();
}

//print_r($_REQUEST);
$status = (object)(array('error'=>'1','message'=>''));

if(isset($_POST['addSubmit'])) {
    $form = array(
        'post_title1' => $_POST['post_title1'],
        'post_title2' => $_POST['post_title2'],
        'post_thumbnail' => $_POST['post_thumbnail'],
        'cate_id' => $_POST['cate_id'],
        'post_description' => $_POST['post_description'],
        'post_content' => $_POST['post_content'],
        'post_slug' => $_POST['post_slug'],
        'date_modified' => time(),
        'date_created' => time()
    );
    $status = BDO::setPost($form);
    //print_r($_POST);
    
}

if(isset($_POST['updateSubmit'])) {
    $form = array(
        'post_title1' => $_POST['post_title1'],
        'post_title2' => $_POST['post_title2'],
        'post_thumbnail' => $_POST['post_thumbnail'],
        'cate_id' => $_POST['cate_id'],
        'post_description' => $_POST['post_description'],
        'post_content' => $_POST['post_content'],
        'post_slug' => $_POST['post_slug'],
        'date_modified' => time(),
        'id' => $_POST['id']
    );
    $status = BDO::updatePost($form);
}

if(isset($_POST['cate_updateSubmit'])) {
    $form = array(
        'cate_title' => $_POST['cate_title'],
        'cate_slug' => $_POST['cate_slug'],
        'cate_thumbnail' => $_POST['cate_thumbnail'],
        'cate_description' => $_POST['cate_description'],
        'cate_id' => $_POST['cate_id']
    );
    $status = BDO::updateCategory($form);
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $status = BDO::deletePost($id);
}

if (isset($_GET['action']) && $_GET['action'] == 'cateDelete') {
    $id = $_GET['cateId'];
    $status = BDO::deleteCategory($id);
}

if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    $id = $_GET['id'];
    $edit = BDO::getPost($id);
}
if (isset($_GET['cate']) && isset($_GET['action']) && $_GET['action'] == 'cateEdit') {
    $cateId = $_GET['cateId'];
    $cateEdit = BDO::getCategory($cateId);
}

if(isset($_POST['cate_addSubmit'])) {
    $form = array(
        'cate_title' => $_POST['cate_title'],
        'cate_slug' => $_POST['cate_slug'],
        'cate_thumbnail' => $_POST['cate_thumbnail'],
        'cate_description' => $_POST['cate_description'],
    );
    $status = BDO::setCategory($form);
    //print_r($_POST);
    
}

$list = BDO::getAllPost();
$cate = BDO::getAllCategory();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pan Admin</title>
    <script src="https://cdn.tiny.cloud/1/fo6tera3kjohoq95chzzm6l4l0hm69w02s9szxoq1h3i309n/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        tinymce.init({
  selector: 'textarea#editor1',
  plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
  imagetools_cors_hosts: ['picsum.photos'],
  menubar: 'file edit view insert format tools table help',
  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
  toolbar_sticky: true,
  autosave_ask_before_unload: true,
  autosave_interval: '30s',
  autosave_prefix: '{path}{query}-{id}-',
  autosave_restore_when_empty: false,
  autosave_retention: '2m',
  image_advtab: true,
  link_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_class_list: [
    { title: 'None', value: '' },
    { title: 'IMG Zoom', value: 'img-viewer' }
  ],
  importcss_append: true,
  file_picker_callback: function (callback, value, meta) {
    /* Provide file and text for the link dialog */
    if (meta.filetype === 'file') {
      callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
    }

    /* Provide image and alt text for the image dialog */
    if (meta.filetype === 'image') {
      callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
    }

    /* Provide alternative source and posted for the media dialog */
    if (meta.filetype === 'media') {
      callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
    }
  },
  templates: [
        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
    { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
    { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
  ],
  template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
  template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
  height: 600,
  image_caption: true,
  quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
  noneditable_noneditable_class: 'mceNonEditable',
  toolbar_mode: 'sliding',
  contextmenu: 'link image imagetools table',
  skin: useDarkMode ? 'oxide-dark' : 'oxide',
  content_css: useDarkMode ? 'dark' : 'default',
  content_style: 'body { font-family: "Roboto Condensed", Arial, Helvetica, Sans-serif;font-size: 16px; font-weight: 400; }'
 });
    </script>
    <style type="text/css">
    @import "https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400&display=swap&subset=vietnamese";
         *, :after, :before {
            box-sizing: border-box;
        margin:0;padding:0;}
        body {background-color:#eee;font-family: 'Roboto Condensed', Arial, Helvetica, Sans-serif;font-size: 16px;font-weight:400;}
        ul li {list-style: none;}
        a {color:#3598db;text-decoration:none;}
        a:hover {color: red;text-decoration: underline;}
        .wrapper {width:1000px;margin:100px auto 50px;}
        .wrapper li {margin-bottom:15px;position:relative;}
        .wrapper li span.label {width:150px; display:inline-block;vertical-align:top;}
        .wrapper li > input[type=text] {width:250px;padding:5px 10px;}
        .wrapper > h2 {margin-bottom:30px;}
        .wrapper button {padding:10px 20px;}
        .wrapper select {padding:5px 10px;}

        .table table {width:100%;border:1px solid #ccc;}
        .table tr:nth-of-type(odd) {background:#ccc;}
        .table th {padding: 5px 10px}
        .table td {padding: 5px 10px}
        .table td a {display:inline-block;margin:0 10px;}
        .table td img{width:70px;}
        
        .control {margin-bottom:30px;}
        .control li {display:inline-block;margin-right:20px;}
        .status {text-align: center;font-size: 20px;color: red;}
        .thumbnail-preview {width: 120px; height: auto;}
    </style>
    
</head>
<body>
    <div class="wrapper">
            <div class="status"><?php echo $status->message; ?></div>
    <div class="control">
            <ul>
            <li><a href="/el/i.php">Home</a></li>
                <li><a href="?action=add">Thêm mới</a></li>
                <li><a href="?cate">Category</a></li>
            </ul>
    </div>
    <?php if(isset($_GET['cate'])) { ?>
    <div class="control">
            <ul>
                <li><a href="?cate&action=addCate">Thêm mới Category</a></li>
            </ul>
    </div>
    <?php } ?>

    <?php if(isset($_GET['cate']) && isset($_GET['action']) && $_GET['action'] == 'addCate') { ?>
    <h2>Thêm mới Category</h2>
        <form action="" method="post">
            <ul>
                <li>
                    <span class="label">Category Title </span>
                    <input type="text" name="cate_title" >
                </li>
                <li>
                    <span class="label" title="Slug">Category Slug</span>
                    <input type="text" name="cate_slug" >
                </li>
                <li>
                    <span class="label" title="Link ảnh Thumbnail (link full)">Category Thumbnail</span>
                    <input type="text" name="cate_thumbnail" >
                </li>
                <li>
                    <span class="label">Category Description</span>
                    <textarea name="cate_description" cols="80" rows="8"></textarea>
                </li>
                <li>
                    <button type="submit" name="cate_addSubmit">Thêm mới</button>
                </li>
            </ul>
        </form>
        <?php } ?>
        <?php if(isset($_GET['cate']) && isset($_GET['action']) && $_GET['action'] == 'cateEdit') { ?>
    <h2>Chỉnh sửa Category</h2>
        <form action="" method="post">
            <ul>
                <li>
                    <span class="label">Category Title </span>
                    <input type="text" name="cate_title" value="<?php echo $cateEdit['cate_title'] ?>">
                </li>
                <li>
                    <span class="label" title="Slug">Category Slug</span>
                    <input type="text" name="cate_slug" value="<?php echo $cateEdit['cate_slug'] ?>">
                </li>
                <li>
                    <span class="label" title="Link ảnh Thumbnail (link full)">Category Thumbnail</span>
                    <input type="text" name="cate_thumbnail" value="<?php echo $cateEdit['cate_thumbnail'] ?>">
                </li>
                <li>
                    <span class="label"></span>
                    <img class="thumbnail-preview" src="<?php echo $cateEdit['cate_thumbnail'] ?>" alt="">
                </li>
                <li>
                    <span class="label">Category Description</span>
                    <textarea name="cate_description" cols="80" rows="8"><?php echo $cateEdit['cate_description'] ?></textarea>
                </li>
                <li>
                <input type="hidden" name="cate_id" value="<?php echo $cateEdit['cate_id'] ?>">
                    <button type="submit" name="cate_updateSubmit">Cập nhật</button>
                </li>
            </ul>
        </form>
        <?php } ?>

    <?php if(isset($_GET['action']) && $_GET['action'] == 'add') { ?>
    <h2>Thêm mới</h2>
        <form action="" method="post">
            <ul>
                <li>
                    <span class="label" title="Hiển thị ngoài Home">Post Title 1</span>
                    <input type="text" name="post_title1" >
                </li>
                <li>
                    <span class="label" title="Hiển thị trong bài viết">Post Title 2</span>
                    <input type="text" name="post_title2" >
                </li>
                <li>
                    <span class="label" title="Slug">Post Slug</span>
                    <input type="text" name="post_slug" >
                </li>
                <li>
                    <span class="label" title="Link ảnh Thumbnail (link full)">Post Thumbnail</span>
                    <input type="text" name="post_thumbnail" >
                </li>
                <li>
                    <span class="label" title="Link ảnh Thumbnail (link full)">Category</span>
                    <select name="cate_id">
                        <?php for ($i=0; $i < count($cate); $i++) { ?>
                        <option value="<?php echo $cate[$i]['cate_id'] ?>"><?php echo $cate[$i]['cate_title'] ?></option>
                        <?php } ?>
                    </select>
                </li>
                <li>
                    <span class="label">Post Description</span>
                    <textarea name="post_description" cols="80" rows="8"></textarea>
                </li>
                <li>
                    <span class="label">Post Content</span>
                    <textarea id="editor1" name="post_content" cols="80" rows="8"></textarea>
                </li>
                <li>
                    <button type="submit" name="addSubmit">Thêm mới</button>
                </li>
            </ul>
        </form>
        <?php } ?>

        <?php if(isset($_GET['action']) && $_GET['action'] == 'edit') { ?>
    <h2>Chỉnh sửa</h2>
        <form action="" method="post">
            <ul>
                <li>
                    <span class="label" title="Hiển thị ngoài Home">Post Title 1</span>
                    <input type="text" name="post_title1" value="<?php echo $edit['post_title1'] ?>">
                </li>
                <li>
                    <span class="label" title="Hiển thị trong bài viết">Post Title 2</span>
                    <input type="text" name="post_title2" value="<?php echo $edit['post_title2'] ?>">
                </li>
                <li>
                    <span class="label" title="Slug">Post Slug</span>
                    <input type="text" name="post_slug" value="<?php echo $edit['post_slug'] ?>">
                </li>
                <li>
                    <span class="label" title="Link ảnh Thumbnail (link full)">Post Thumbnail</span>
                    <input type="text" name="post_thumbnail" value="<?php echo $edit['post_thumbnail'] ?>">
                </li>
                <li>
                    <span class="label"></span>
                    <img class="thumbnail-preview" src="<?php echo $edit['post_thumbnail'] ?>" alt="">
                </li>
                <li>
                    <span class="label">Category</span>
                    <select name="cate_id">
                        <?php for ($i=0; $i < count($cate); $i++) { ?>
                        <option <?php echo ($cate[$i]['cate_id'] == $edit['cate_id']) ?  'selected' :  ''; ?> value="<?php echo $cate[$i]['cate_id'] ?>"><?php echo $cate[$i]['cate_title'] ?></option>
                        <?php } ?>
                    </select>
                </li>
                <li>
                    <span class="label">Post Description</span>
                    <textarea name="post_description" cols="80" rows="8"><?php echo $edit['post_description'] ?></textarea>
                </li>
                <li>
                    <span class="label">Post Content</span>
                    <textarea id="editor1" name="post_content" cols="80" rows="8">
                    <?php echo $edit['post_content'] ?>
                    </textarea>
                </li>
                <li>
                    <input type="hidden" name="id" value="<?php echo $edit['post_id'] ?>">
                    <button type="submit" name="updateSubmit">Cập nhật</button>
                </li>
            </ul>
        </form>
        <?php } ?>


         <?php if(!isset($_GET['cate'])) { ?>                   
        <div class="table">
            <table>
                <tr>
                    <th>#id</th>
                    <th>Title 1</th>
                    <th>Title 2</th>
                    <th>Category</th>
                    <th>Thumbnail</th>
                    <th>View</th>
                    <th>Action</th>
                </tr>
                <?php for($i = 0; $i < count($list); $i++) { ?>
                <tr>
                    <td><?php echo $list[$i]['post_id'] ?></td>
                    <td><a target="_blank" href="https://pankami.com/bdo/<?php echo $list[$i]['post_slug'] ?>"><?php echo $list[$i]['post_title1'] ?></a></td>
                    <td><?php echo $list[$i]['post_title2'] ?></td>
                    <td><?php echo $list[$i]['cate_title'] ?></td>
                    <td><img src="<?php echo $list[$i]['post_thumbnail'] ?>" alt="image"></td>
                    <td><?php echo $list[$i]['post_view'] ?></td>
                    <td style="text-align: center;"><a href="?action=edit&id=<?php echo $list[$i]['post_id'] ?>">Edit</a> <hr /> <a href="?action=delete&id=<?php echo $list[$i]['post_id'] ?>" onclick="return confirm('Are you sure want to delete this?');">Delete</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <?php } ?>
        <?php if(isset($_GET['cate'])) { ?>                   
        <div class="table">
            <table>
                <tr>
                    <th>#id</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Thumbnail</th>
                    <th>Action</th>
                </tr>
                <?php for($i = 0; $i < count($cate); $i++) { ?>
                <tr>
                    <td><?php echo $cate[$i]['cate_id'] ?></td>
                    <td><?php echo $cate[$i]['cate_title'] ?></td>
                    <td><?php echo $cate[$i]['cate_slug'] ?></td>
                    <td><img src="<?php echo $cate[$i]['cate_thumbnail'] ?>" alt="image"></td>
                    <td><a href="?cate&action=cateEdit&cateId=<?php echo $cate[$i]['cate_id'] ?>">Edit</a>|<a href="?cate&action=cateDelete&cateId=<?php echo $cate[$i]['cate_id'] ?>" onclick="return confirm('Are you sure want to delete this?');">Delete</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <?php } ?>
    </div>
</body>
</html>