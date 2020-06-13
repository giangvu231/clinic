<?php
// config
$link_limit = 5; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>

<?php if($paginator->lastPage() > 1): ?>
    <ul class="pagination">
        
        <?php if($paginator->onFirstPage()): ?>
            <li class="page-item disabled"><span class="page-link"><?php echo app('translator')->getFromJson('pagination.previous'); ?></span></li>
        <?php else: ?>
            <li class="page-item"><a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>"
                                     rel="prev"><?php echo app('translator')->getFromJson('pagination.previous'); ?></a></li>
        <?php endif; ?>
        <?php for($i = 1; $i <= $paginator->lastPage(); $i++): ?>
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $paginator->currentPage() - $half_total_links;
            $to = $paginator->currentPage() + $half_total_links;
            if ($paginator->currentPage() < $half_total_links) {
               $to += $half_total_links - $paginator->currentPage();
            }
            if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
            }
            ?>
            <?php if($from < $i && $i < $to): ?>
                <li class="<?php echo e(($paginator->currentPage() == $i) ? ' active' : ''); ?>">
                    <a href="<?php echo e($paginator->url($i)); ?>"><?php echo e($i); ?></a>
                </li>
            <?php endif; ?>
        <?php endfor; ?>
        
        <?php if($paginator->hasMorePages()): ?>
            <li class="page-item"><a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"><?php echo app('translator')->getFromJson('pagination.next'); ?></a>
            </li>
        <?php else: ?>
            <li class="page-item disabled"><span class="page-link"><?php echo app('translator')->getFromJson('pagination.next'); ?></span></li>
        <?php endif; ?>
    </ul>
<?php endif; ?>
