    <link rel="stylesheet" href="css/add-collection-modal.css" type="text/css">
    <script>

        var object_news;

        /*save collection click*/
        function addCollection(x) {
            console.log(x);
            // var x = document.getElementById("add-new-collection").textContent;
            // console.log(x);
            object_news = x
            document.getElementById('add-news-modal').style.display = 'block';

            document.getElementById('news-title').textContent = object_news.title;
            document.getElementById('news-source').textContent = object_news.source;
        }

        function retrieveCreatedCollection(){
             $(document).ready(function() {
                $("#add-news #collection-list").load("controllers/retrive-new-collection.inc.php", {});
            });
        }

        $(document).ready(function() {
            /*add new collection submit*/
            $("#add-news").on('submit', function (event) {

                    event.preventDefault();
                    var name = $("#add-news input[name='collection-name']").val();
                    var submit = $("#add-news button[name='submit']").val();

                        $("#add-news #collection-list").load("controllers/add-new-collection.inc.php",
                        {
                            name: name,
                            submit:submit
                        });
            });

             /*save new news submit*/
            $("#add-new-news").on('submit', function (event) {

                    event.preventDefault();

                    var collectionId = $("#collection-list input[name='collection']:checked").val();
                    var submit = $("#add-new-news button[name='submit']").val();
                    var newsComment = $("#add-new-news textarea[name='comment']").val();

                    $("#add-new-news #save-news-error").load("controllers/save-new-news.inc.php",
                    {
                        collectionId: collectionId,
                        author: object_news.author,
                        description:object_news.description,
                        publishedAt:object_news.publishedAt,
                        title:object_news.title,
                        url:object_news.url,
                        urlToImagele:object_news.urlToImagele,
                        source:object_news.source,
                        userComment:newsComment,
                        submit:submit,
                    });
            });
        });

    </script>

    <div id="add-news-modal" class="add-news-modal">

        <div class="add-news-modal-content animate">
            <div class="imgcontainer">
                <span onclick="document.getElementById('add-news-modal').style.display='none'" class="add-news-close" title="Close Modal">&times;</span>
            </div>

            <div class="modal-body">
                <header>Add into Collection</header>
                <ul>
                    <li class="add-news-collection" >
                        <h3>Collection</h3>
                        <form id="add-news" action="controllers/add-new-collection.inc.php" method="POST">
                            <input type="text" placeholder="Collection Name" name="collection-name" required>
                            <div class="create-new-collection">
                                <button class="create-button" type="submit" name="submit">
                                    <i class="fa fa-plus-circle"></i>
                                    <span>Create Collection<span>
                                </button>
                                <div id="collection-list"><div>
                            </div>
                        </form>
                    </li>
                    <li class="add-news-data">
                        <form id="add-new-news" action="controllers/add-new-collection.inc.php" method="POST">
                            <div class="add-news-detail">
                                <div>
                                    <div id="news-title"></div>
                                    <div id="news-source"></div>
                                </div>
                            </div>
                            <textarea id="news-comment" name="comment" placeholder="Add a comment (Optional)"></textarea>
                            <div class="create-button-group">
                                <button type="button" class="cancel-create-btn" onclick="document.getElementById('add-news-modal').style.display='none'">Cancel</button>
                                <button type="submit" name="submit">Add</button>
                            </div>
                            <div id="save-news-error"></div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <?php
        include 'view/snackbar-bottom.php';
    ?>

    <?php 
        /*retrieve created collection*/
        echo '<script type="text/javascript">',
        'retrieveCreatedCollection();',
        '</script>';    
     ?>

