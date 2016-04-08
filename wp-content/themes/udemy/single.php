<?php the_content(); ?>
    <?php wp_link_pages(array (
        'before'           => '<p class="text-center">' . __( 'Pages:' ),
    ); ?>
    <?php the_tags(); ?>
</div>
<nav class="text-center">
    <ul class="pagination">
        <li>
            <?php previous_post_link('%link', '<i class"fa fa-chevron-left"></i> %title' ); ?>
        </li>
        <li>
            <?php next_post_link('%link', '%title <i class"fa fa-chevron-right"></i>' ); ?>
        </li>
    </ul>
</nav>

<?php get_header(); ?>

<section id="blog" class="section">
    <div class="container">
        <div class="row">
            <section id="blog-posts" class="col-sm-8">

                <article class="card">
                    <div class="card-image">
                        <img src="images/blog/1.jpg" class="img-responsive">
                    </div>
                    <div class="card-content">
                        <h3>
                            <span class="date">04 Oct</span>
                            <a href="javascript:void(0);" title="">Post with Image</a>
                        </h3>
                        <div class="card-info">
                            <span class="time">Posted at 15:55h</span>
                            <span class="tag"><a href="javascript:void(0);">Business</a></span>
                            <span class="post-author">by <a href="javascript:void(0);">admin</a></span>
                        </div>
                        <p class="post-excerpt">Lorem ipsum dolor sit amet, nunc ut, doloribus orci eleifend suspendisse vulputate ridiculus donec, tempus gravida ultrices eget libero nunc.
                            Sodales molestiae nec sollicitudin, pellentesque ullam auctor duis erat, phasellus in magnis tempus.</p>
                    </div>
                    <div class="card-action">
                        <a href="javascript:void(0);" type="button" class="btn btn-sm btn-primary rippler rippler-default">Read More</a>
                    </div>
                </article>

                <article class="card">
                    <div class="card-image">
                        <img src="images/blog/1.jpg" class="img-responsive">
                    </div>
                    <div class="card-content">
                        <h3>
                            <span class="date">04 Oct</span>
                            <a href="javascript:void(0);" title="">Post with Image</a>
                        </h3>
                        <div class="card-info">
                            <span class="time">Posted at 15:55h</span>
                            <span class="tag"><a href="javascript:void(0);">Business</a></span>
                            <span class="post-author">by <a href="javascript:void(0);">admin</a></span>
                        </div>
                        <p class="post-excerpt">Lorem ipsum dolor sit amet, nunc ut, doloribus orci eleifend suspendisse vulputate ridiculus donec, tempus gravida ultrices eget libero nunc.
                            Sodales molestiae nec sollicitudin, pellentesque ullam auctor duis erat, phasellus in magnis tempus.</p>
                    </div>
                    <div class="card-action">
                        <a href="javascript:void(0);" type="button" class="btn btn-sm btn-primary rippler rippler-default">Read More</a>
                    </div>
                </article>

                <article class="card">
                    <div class="card-image">
                        <img src="images/blog/1.jpg" class="img-responsive">
                    </div>
                    <div class="card-content">
                        <h3>
                            <span class="date">04 Oct</span>
                            <a href="javascript:void(0);" title="">Post with Image</a>
                        </h3>
                        <div class="card-info">
                            <span class="time">Posted at 15:55h</span>
                            <span class="tag"><a href="javascript:void(0);">Business</a></span>
                            <span class="post-author">by <a href="javascript:void(0);">admin</a></span>
                        </div>
                        <p class="post-excerpt">Lorem ipsum dolor sit amet, nunc ut, doloribus orci eleifend suspendisse vulputate ridiculus donec, tempus gravida ultrices eget libero nunc.
                            Sodales molestiae nec sollicitudin, pellentesque ullam auctor duis erat, phasellus in magnis tempus.</p>
                    </div>
                    <div class="card-action">
                        <a href="javascript:void(0);" type="button" class="btn btn-sm btn-primary rippler rippler-default">Read More</a>
                    </div>
                </article>

                <article class="card">
                    <div class="card-image">
                        <img src="images/blog/1.jpg" class="img-responsive">
                    </div>
                    <div class="card-content">
                        <h3>
                            <span class="date">04 Oct</span>
                            <a href="javascript:void(0);" title="">Post with Image</a>
                        </h3>
                        <div class="card-info">
                            <span class="time">Posted at 15:55h</span>
                            <span class="tag"><a href="javascript:void(0);">Business</a></span>
                            <span class="post-author">by <a href="javascript:void(0);">admin</a></span>
                        </div>
                        <p class="post-excerpt">Lorem ipsum dolor sit amet, nunc ut, doloribus orci eleifend suspendisse vulputate ridiculus donec, tempus gravida ultrices eget libero nunc.
                            Sodales molestiae nec sollicitudin, pellentesque ullam auctor duis erat, phasellus in magnis tempus.</p>
                    </div>
                    <div class="card-action">
                        <a href="javascript:void(0);" type="button" class="btn btn-sm btn-primary rippler rippler-default">Read More</a>
                    </div>
                </article>

                <article class="card">
                    <div class="card-image">
                        <img src="images/blog/1.jpg" class="img-responsive">
                    </div>
                    <div class="card-content">
                        <h3>
                            <span class="date">04 Oct</span>
                            <a href="javascript:void(0);" title="">Post with Image</a>
                        </h3>
                        <div class="card-info">
                            <span class="time">Posted at 15:55h</span>
                            <span class="tag"><a href="javascript:void(0);">Business</a></span>
                            <span class="post-author">by <a href="javascript:void(0);">admin</a></span>
                        </div>
                        <p class="post-excerpt">Lorem ipsum dolor sit amet, nunc ut, doloribus orci eleifend suspendisse vulputate ridiculus donec, tempus gravida ultrices eget libero nunc.
                            Sodales molestiae nec sollicitudin, pellentesque ullam auctor duis erat, phasellus in magnis tempus.</p>
                    </div>
                    <div class="card-action">
                        <a href="javascript:void(0);" type="button" class="btn btn-sm btn-primary rippler rippler-default">Read More</a>
                    </div>
                </article>

                <nav class="text-center">
                    <ul class="pagination">
                        <li>
                            <a href="javascript:void(0);" aria-label="Previous">
                                <i class="fa fa-chevron-left"></i>
                            </a>
                        </li>
                        <li class="active"><a href="javascript:void(0);">1</a></li>
                        <li><a href="javascript:void(0);">2</a></li>
                        <li>
                            <a href="javascript:void(0);" aria-label="Next">
                                <i class="fa fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>


            </section>
            <aside id="sidebar" class="col-sm-4">

                <div class="card">
                    <div class="card-header bg-primary">
                        <span class="card-title">Search</span>
                    </div>
                    <div class="card-content">
                        <div class="widget">
                            <form role="search" method="get" id="searchform" class="searchform" action="http://localhost:8080/Udemy/wp/">
                                <div class="input-group">
                                    <input type="text" placeholder="Search" class="input-sm form-control" name="s" id="search" value="">
                                    <span class="input-group-btn"><button type="button" class="btn btn-sm btn-primary rippler rippler-default btn-flat with-border"><i class="fa fa-search"></i></button></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-primary"><span class="card-title">Recent Posts</span></div>
                    <div class="card-content">
                        <div class="widget">
                            <ul>
                                <li><a href="#">Porro voluptas omnis eaque</a></li>
                                <li><a href="#">Porro voluptas omnis eaque</a></li>
                                <li><a href="#">Porro voluptas omnis eaque</a></li>
                                <li><a href="#">Porro voluptas omnis eaque</a></li>
                                <li><a href="#">Porro voluptas omnis eaque</a></li>
                                <li><a href="#">Porro voluptas omnis eaque</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </aside>
        </div>
    </div>
</section>

<?php get_footer();?>
