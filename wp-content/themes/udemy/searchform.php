<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url('/'); ?>">
    <div class="input-group">
        <input type="text" placeholder="Search" class="input-sm form-control" name="s" id="search" value="<?php the_search_query(); ?>">
        <span class="input-group-btn"><button type="button" class="btn btn-sm btn-primary rippler rippler-default btn-flat with-border">
            <i class="fa fa-search"></i>
        </span>
    </div>
</form>
