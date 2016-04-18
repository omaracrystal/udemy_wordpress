<footer class="footer">
    <div class="container">
       <?php
           theme_opts   =      get_option('cu_opts');
           echo stripcslashes_deep($theme_opts['footer']);
       ?>
    </div>
</footer>

<?php wp_footer( ); ?>
</body>
</html>
