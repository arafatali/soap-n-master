		<?php
			if($this->name == 'Shop'){
			/** 検索 */
			echo $this->Form->create('Shop', array("url" => "/Shop/index", 'novalidate' => true));
		?>
		<div class="search_box">
			<div class="title">検索</div>
				<!--<select name="" class="select">
					<option value="">詳細情報で絞込み</option>
					<option value="未払い">未払い</option>
					<option value="VIPプラン">VIPプラン</option>
					<option value="基本プラン">基本プラン</option>
					<option value="無料プラン">無料プラン</option>
					<option value="違反有り">違反有り</option>
				</select>-->
				<span class="checkboxC"><?php
					echo $this->Form->input('pay_status_id', 
						array('type' => 'checkbox', 
							'id' => 'ShopPayStatusId', 
							'value' => 2,
							'div' => false, 
							'label' => false, 'hiddenField' => false)) . "<label for='ShopPayStatusId'>" . $payStatuses[2] . "</label>";//未払い
				?></span>
				<span class="checkboxC"><?php
					echo $this->Form->input('violation_cnt', 
						array('type' => 'checkbox', 
							'id' => 'ShopViolationCnt', 
							'value' => 1,
							'div' => false, 
							'label' => false, 'hiddenField' => false)) . "<label for='ShopViolationCnt'>" . "違反有り" . "</label>";
				?></span>
				<?php
					/** 掲載プランで絞込み */
					echo $this->Form->input('plan_id',
						array('div'=>false,
							'label'=>false,
							'type'=>'select',
							'empty'=>'掲載プランで',
							'options'=>$plans,
							'class'=>'selectC')
					);
				?>
				<?php
					/** 掲載エリアで絞込み */
					echo $this->Form->input('prefecture_id',
						array('div'=>false,
							'label'=>false,
							'type'=>'select',
							'empty'=>'掲載エリアで',
							'options'=>$prefectures,
							'class'=>'selectC')
					);
				?>
				<!--<button type="reset" class="btn">絞込み解除</button>-->
		<?php
			echo $this->Form->button('検索', array('name'=>'search', 'type' => 'submit', 'class' => 'btn'));
			echo $this->Form->end();
		?>
		</div><!-- .search_box [End] -->
		<?php }elseif($this->name == 'News'){ ?>
		<?php
			/** 検索 お知らせ */
			echo $this->Form->create('News', array("url" => "/News/index", 'novalidate' => true));
		?>
		<div class="search_box">
			<div class="title">検索</div>
				<?php
					/** 掲載お知らせカテゴリで絞込み */
					echo $this->Form->input('news_type_id',
						array('div'=>false,
							'label'=>false,
							'type'=>'select',
							'empty'=>'カテゴリ',
							'options'=>$newsTypes,
							'class'=>'selectC')
					);
				?>
				<!--<button type="reset" class="btn">絞込み解除</button>-->
		<?php
			echo $this->Form->button('検索', array('name'=>'search', 'type' => 'submit', 'class' => 'btn'));
			echo $this->Form->end();
		?>
		</div><!-- .search_box [End] -->
		<?php } ?>
		<div class="shop_box">
			<div class="title">店舗管理</div>
				<div class="btn_box">
					<input type="button" value="新規登録" class="btn" onclick="location.href='/shop/add'" />
					<input type="button" value="メッセージを送る" class="btn2" onclick="location.href='/shop/sent_msg'" />
					<input type="button" value="一括削除" class="btn" onclick="location.href='/shop/delete/all'" />
				</div>
		</div><!-- .shop_box [End] -->
	</form>