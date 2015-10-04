<li>
    <a href="?category=<?=$category['id']?>"><?=$category['title']?></a>
    <?php if($category['childs']):?>
        <ul>
            <?php echo category_to_string($category['childs']); ?>
        </ul>
    <?php endif;?>
</li>