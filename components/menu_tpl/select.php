<li>
    <a href="">
        <?= $category['name']; ?>
        <?php if (isset($category['children'])): ?>
            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
        <?php endif; ?>
    </a>
    <?php if (isset($category['children'])): ?>
        <ul>
            <?= $this->getMenuHtml($category['children']); ?>
        </ul>
    <?php endif; ?>
</li>