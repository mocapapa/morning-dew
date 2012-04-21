<ul>
  <li style="margin-left:10px;">
    <?php echo CHtml::link('決め事の説明', array('/display/index')); ?>
  </li>
  <li style="margin-left:10px;">
    <?php echo CHtml::link('ニュースの管理', array('/news/admin')); ?>
  </li>
  <li style="margin-left:10px;">
    <?php echo CHtml::link('記事の管理', array('/article/admin')); ?>
  </li>
  <li style="margin-left:10px;">
    <?php echo CHtml::link('画像の管理', array('/image/upload')); ?>
  </li>
    <?php
       if (Yii::app()->user->name==ADMIN_USER) {
	  echo '<li style="margin-left:10px;">';
          echo CHtml::link('ログアウト', array('/site/logout'));
	  echo '</li>';
       }
    ?>
</ul>


