<?php
/*
Template Name: トップページ
*/
?>

<?php get_header(); ?>

        <main>
            <article>
                <section class="topSlideSp">
                    <ul class="slide-items01">
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/slide01_sp.jpg" alt=""></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/slide02_sp.jpg" alt=""></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/slide03_sp.jpg" alt=""></li>
                      </ul>
                </section>

                <section class="topSlidePc">
                    <ul class="slide-items01">
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/slide01.jpg" alt=""></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/slide02.jpg" alt=""></li>
                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/slide03.jpg" alt=""></li>
                      </ul>
                </section>

                <section class="topInformation">
                    <div class="topInformationIn">
                        <div class="pickupList">
                            <h2>PICK UP</h2>
                            <ul>
                                <?php
                                    $args = array(
                                        'post_type' => 'news_info', //カスタム投稿タイプ名
                                        'posts_per_page' => 2 //取得する投稿の件数
                                    );
                                    $my_query = new WP_Query( $args );
                                ?>
                                <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('full'); ?>
                                        <p><?php the_title(); ?></p>
                                    </a>
                                </li>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            </ul>
                        </div>

                        <div class="reservLink pc">
                            <h2>ご来店予約</h2>
                            <a href="<?php echo esc_url( home_url( '/reservation') ); ?>" class="btn"><img src="<?php echo get_template_directory_uri(); ?>/images/reservation-link01.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="reservLinkSp sp">
                        <a href="<?php echo esc_url( home_url( '/reservation') ); ?>" class="btn"><img src="<?php echo get_template_directory_uri(); ?>/images/reservation-link01_sp.jpg" alt=""></a>
                    </div>
                </section>

                <section class="topWakoText">
                    <p>
                    WAKO WORKSHOPは、広島でジュエリーリフォーム・修理・オーダーメイドを行う工房です。<br>
                    ジュエリーのプロフェッショナルブランドWAKO（宝石商 和光）の自社工房と職人達なります。
                    </p>
                </section>

                <section class="topCategoryLink">
                    <ul class="topCategoryLinkIn">
                        <li class="topCategoryLinkList">
                            <dl class="tclImgLeft">
                                <dt>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/catlink01.jpg">
                                </dt>
                                <dd>
                                    <h3>リフォーム&nbsp;<span>reform</span></h3>
                                    <p>眠っていたジュエリーに<br class="sp">新しい目覚めの時をさずける</p>
                                    <ul>
                                        <li><a href="<?php echo esc_url( home_url( '/service#Reform') ); ?>">詳しく見る</a></li>
                                    </ul>
                                </dd>
                            </dl>
                        </li>

                        <li class="topCategoryLinkList">
                            <dl class="tclImgRight">
                                <dt>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/catlink02.jpg">
                                </dt>
                                <dd>
                                    <h3>修理&nbsp;<span>repair</span></h3>
                                    <p>大切なジュエリーをずっと輝き続かせるために</p>
                                    <ul>
                                        <li><a href="<?php echo esc_url( home_url( '/service#Repair') ); ?>">詳しく見る</a></li>
                                    </ul>
                                </dd>
                            </dl>
                        </li>

                        <li class="topCategoryLinkList">
                            <dl class="tclImgLeft">
                                <dt>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/catlink03.jpg">
                                </dt>
                                <dd>
                                    <h3>オーダー&nbsp;<span>order</span></h3>
                                    <p>世界でひとつ、あなただけのジュエリーを</p>
                                    <ul>
                                        <li><a href="<?php echo esc_url( home_url( '/service#Order') ); ?>">詳しく見る</a></li>
                                    </ul>
                                </dd>
                            </dl>
                        </li>
                    </ul>
                </section>

                <section class="topReformSlide">
                    <h2>Reform</h2>
                    <p>リフォーム実績</p>
                    <div class="topSlideBox pc">
                        <ul class="slide-items02">
                            <?php
                                $args = array(
                                    'post_type' => 'reform', //カスタム投稿タイプ名
                                    'posts_per_page' => 3 //取得する投稿の件数
                                );
                                $my_query = new WP_Query( $args );
                            ?>
                            <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                            <li>
                                <?php if ( is_object_in_term($post->ID, 'reform-category','reform-jewelry')) : //条件 ?>
                                    <dl>
                                        <dt>
                                            <span>BEFORE</span>
                                            <?php if( get_field('image01') ): //before画像取得 ?> 
                                                <img src="<?php the_field('image01'); ?>" />
                                            <?php endif; ?>
                                        </dt>
                                        <dd>
                                            <span>AFTER</span>
                                            <?php if( get_field('image02') ): //after画像取得 ?> 
                                                <img src="<?php the_field('image02'); ?>" />
                                            <?php endif; ?>
                                        </dd>
                                    </dl>
                                <?php else: ?>
                                    <?php if( get_field('image02') ): //after画像取得 ?> 
                                        <img class="orderImg" src="<?php the_field('image02'); ?>" />
                                    <?php endif; ?>
                                <?php endif; ?>
                                <h3><?php echo get_the_title($post->ID); //タイトル取得 ?></h3>
                                <?php if( get_field('cost') ): //費用 ?><h4><?php the_field('cost'); ?>円</h4><?php endif; ?>
                                <?php if( get_field('period') ): //期間 ?><h5>製作期間:<?php the_field('period'); ?></h5><?php endif; ?>
                                <a href="<?php echo get_permalink($post->ID); ?>"><span>view more</span></a>
                            </li>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </ul>
                        <a href="/reform" class="slideUnderLink">リフォーム実績の一覧を見る</a>
                    </div>

                    <div class="topSlideBox sp">
                        <ul class="slide-items03">
                        <?php
                                $args = array(
                                    'post_type' => 'reform', //カスタム投稿タイプ名
                                    'posts_per_page' => 5 //取得する投稿の件数
                                );
                                $my_query = new WP_Query( $args );
                            ?>
                            <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                            <li>
                                <?php if ( is_object_in_term($post->ID, 'reform-category','reform-jewelry')) : //条件 ?>
                                    <dl>
                                        <dt>
                                            <span>BEFORE</span>
                                            <?php if( get_field('image01') ): //before画像取得 ?> 
                                                <img src="<?php the_field('image01'); ?>" />
                                            <?php endif; ?>
                                        </dt>
                                        <dd>
                                            <span>AFTER</span>
                                            <?php if( get_field('image02') ): //after画像取得 ?> 
                                                <img src="<?php the_field('image02'); ?>" />
                                            <?php endif; ?>
                                        </dd>
                                    </dl>
                                <?php else: ?>
                                    <?php if( get_field('image02') ): //after画像取得 ?> 
                                        <img class="orderImg" src="<?php the_field('image02'); ?>" />
                                    <?php endif; ?>
                                <?php endif; ?>
                                <h3><?php echo get_the_title($post->ID); //タイトル取得 ?></h3>
                                <?php if( get_field('cost') ): //費用 ?><h4><?php the_field('cost'); ?>円</h4><?php endif; ?>
                                <?php if( get_field('period') ): //期間 ?><h5>製作期間:<?php the_field('period'); ?></h5><?php endif; ?>
                                <a href="<?php echo get_permalink($post->ID); ?>"><span>view more</span></a>
                            </li>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </ul>
                        <a href="/reform" class="slideUnderLink">リフォーム実績の一覧を見る</a>
                    </div>
                
                    <h2>Repair</h2>
                    <p>修理実績</p>
                    <div class="topSlideBox pc">
                        <ul class="slide-items02">
                            <?php
                                $args = array(
                                    'post_type' => 'repair', //カスタム投稿タイプ名
                                    'posts_per_page' => 3 //取得する投稿の件数
                                );
                                $my_query = new WP_Query( $args );
                            ?>
                            <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                            <li>
                                <?php if ( is_object_in_term($post->ID, 'repair-category','repair-jewelry')) : //条件 ?>
                                    <dl>
                                        <dt>
                                            <span>BEFORE</span>
                                            <?php if( get_field('repair-image01') ): //before画像取得 ?> 
                                                <img src="<?php the_field('repair-image01'); ?>" />
                                            <?php endif; ?>
                                        </dt>
                                        <dd>
                                            <span>AFTER</span>
                                            <?php if( get_field('repair-image02') ): //after画像取得 ?> 
                                                <img src="<?php the_field('repair-image02'); ?>" />
                                            <?php endif; ?>
                                        </dd>
                                    </dl>
                                <?php else: ?>
                                    <?php if( get_field('repair-image02') ): //after画像取得 ?> 
                                        <img class="orderImg" src="<?php the_field('repair-image02'); ?>" />
                                    <?php endif; ?>
                                <?php endif; ?>
                                <h3><?php echo get_the_title($post->ID); //タイトル取得 ?></h3>
                                <?php if( get_field('repair-cost') ): //費用 ?><h4><?php the_field('repair-cost'); ?>円</h4><?php endif; ?>
                                <?php if( get_field('repair-period') ): //期間 ?><h5>製作期間:<?php the_field('repair-period'); ?></h5><?php endif; ?>
                                <a href="<?php echo get_permalink($post->ID); ?>"><span>view more</span></a>
                            </li>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </ul>
                        <a href="/repair" class="slideUnderLink">修理実績の一覧を見る</a>
                    </div>

                    <div class="topSlideBox sp">
                        <ul class="slide-items03">
                            <?php
                                $args = array(
                                    'post_type' => 'repair', //カスタム投稿タイプ名
                                    'posts_per_page' => 5 //取得する投稿の件数
                                );
                                $my_query = new WP_Query( $args );
                            ?>
                            <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                            <li>
                                <?php if ( is_object_in_term($post->ID, 'repair-category','repair-jewelry')) : //条件 ?>
                                    <dl>
                                        <dt>
                                            <span>BEFORE</span>
                                            <?php if( get_field('repair-image01') ): //before画像取得 ?> 
                                                <img src="<?php the_field('repair-image01'); ?>" />
                                            <?php endif; ?>
                                        </dt>
                                        <dd>
                                            <span>AFTER</span>
                                            <?php if( get_field('repair-image02') ): //after画像取得 ?> 
                                                <img src="<?php the_field('repair-image02'); ?>" />
                                            <?php endif; ?>
                                        </dd>
                                    </dl>
                                <?php else: ?>
                                    <?php if( get_field('repair-image02') ): //after画像取得 ?> 
                                        <img class="orderImg" src="<?php the_field('repair-image02'); ?>" />
                                    <?php endif; ?>
                                <?php endif; ?>
                                <h3><?php echo get_the_title($post->ID); //タイトル取得 ?></h3>
                                <?php if( get_field('repair-cost') ): //費用 ?><h4><?php the_field('repair-cost'); ?>円</h4><?php endif; ?>
                                <?php if( get_field('repair-period') ): //期間 ?><h5>製作期間:<?php the_field('repair-period'); ?></h5><?php endif; ?>
                                <a href="<?php echo get_permalink($post->ID); ?>"><span>view more</span></a>
                            </li>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </ul>
                        <a href="/repair" class="slideUnderLink">修理実績の一覧を見る</a>
                    </div>

                    <h2>Order Jewelry</h2>
                    <p>オーダージュエリー実績</p>
                    <div class="topSlideBox pc">
                        <ul class="slide-items02">
                            <?php
                                $args = array(
                                    'post_type' => 'order_jewelry', //カスタム投稿タイプ名
                                    'posts_per_page' => 3 //取得する投稿の件数
                                );
                                $my_query = new WP_Query( $args );
                            ?>
                            <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                            <li>
                            <?php if( get_field('order-image01') ): //before画像があれば ?>
                        <dl>
                            <dt>
                                <span>BEFORE</span>
                                <img src="<?php the_field('order-image01'); ?>" />
                            </dt>
                            <dd>
                                <span>AFTER</span>
                                <?php if( get_field('order-image02') ): //after画像取得 ?><img src="<?php the_field('order-image02'); ?>" /><?php endif; ?>
                            </dd>
                        </dl>
                    <?php else: //before画像がなければ ?>
                        <?php if( get_field('order-image02') ): //after画像取得 ?><img src="<?php the_field('order-image02'); ?>" class="orderImage01" /><?php endif; ?>
                    <?php endif; ?>
                                <h3><?php echo get_the_title($post->ID); //タイトル取得 ?></h3>
                                <?php if( get_field('order-cost') ): //費用 ?><h4><?php the_field('order-cost'); ?>円</h4><?php endif; ?>
                                <?php if( get_field('order-period') ): //期間 ?><h5>製作期間:<?php the_field('order-period'); ?></h5><?php endif; ?>
                                <a href="<?php echo get_permalink($post->ID); ?>"><span>view more</span></a>
                            </li>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </ul>
                        <a href="/order_jewelry" class="slideUnderLink">オーダージュエリー実績の<br>一覧を見る</a>
                    </div>

                    <div class="topSlideBox sp">
                        <ul class="slide-items03">
                            <?php
                                $args = array(
                                    'post_type' => 'order_jewelry', //カスタム投稿タイプ名
                                    'posts_per_page' => 5 //取得する投稿の件数
                                );
                                $my_query = new WP_Query( $args );
                            ?>
                            <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                            <li>
                            <?php if( get_field('order-image01') ): //before画像があれば ?>
                        <dl>
                            <dt>
                                <span>BEFORE</span>
                                <img src="<?php the_field('order-image01'); ?>" />
                            </dt>
                            <dd>
                                <span>AFTER</span>
                                <?php if( get_field('order-image02') ): //after画像取得 ?><img src="<?php the_field('order-image02'); ?>" /><?php endif; ?>
                            </dd>
                        </dl>
                    <?php else: //before画像がなければ ?>
                        <?php if( get_field('order-image02') ): //after画像取得 ?><img src="<?php the_field('order-image02'); ?>" class="orderImage01" /><?php endif; ?>
                    <?php endif; ?>
                                <h3><?php echo get_the_title($post->ID); //タイトル取得 ?></h3>
                                <?php if( get_field('order-cost') ): //費用 ?><h4><?php the_field('order-cost'); ?>円</h4><?php endif; ?>
                                <?php if( get_field('order-period') ): //期間 ?><h5>製作期間:<?php the_field('order-period'); ?></h5><?php endif; ?>
                                <a href="<?php echo get_permalink($post->ID); ?>"><span>view more</span></a>
                            </li>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        </ul>
                        <a href="/order_jewelry" class="slideUnderLink">オーダージュエリー実績の<br>一覧を見る</a>
                    </div>
                </section>

                <section class="topWorkshopInfo">
                    <h2>工房案内</h2>
                    <ul>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/shop01.jpg">
                        </li>
                        <li>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/shop02.jpg">
                        </li>
                    </ul>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/rogo01.jpg" class="twiImg">
                    <div class="twiAdd">
                        <address>
                            〒730-0035 広島市中区本通5-11<br>
                            TEL : 082-545-5566 FAX : 082-544-6667<br>
                            営業時間 : 10:30～19:30<br>
                            定休日：水曜日
                        </address>
                        <div class="twiApp">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/app-qr01.png">
                            <p>
                                WAKO WORKSHOP<br>
                                アプリQRコード
                            </p>
                        </div>
                    </div>
                </section>

                <section class="topWorkshopUnder">
                    <ul>
                        <li class="twuLink01"><a href="<?php echo esc_url( home_url( '/workshop') ); ?>"><span>工房の紹介</span></a></li>
                        <li class="twuLink02"><a href="<?php echo esc_url( home_url( '/reservation') ); ?>"><span>ご来店予約はこちら</span></a></li>
                    </ul>
                </section>

                <section class="topAboutLink">
                    <ul>
                        <li>
                        <a href="<?php echo esc_url( home_url( '/craftsman') ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/craftsman-banner01.jpg"></a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url( home_url( '/about') ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/about-banner01.jpg"></a>
                        </li>
                    </ul>
                </section>

                <section class="topContentsList">
                    <div class="topNissiList">
                        <h2>工房日誌</h2>
                        <ul>
                            <?php
                                    $args = array(
                                        'post_type' => 'post', //カスタム投稿タイプ名
                                        'posts_per_page' => 5 //取得する投稿の件数
                                    );
                                    $my_query = new WP_Query( $args );
                                ?>
                                <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>"><data><?php the_time('Y-m-d'); ?>&nbsp;</data><span><?php the_title(); ?></span></a>
                                </li>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                        </ul>
                    </div>
                    <div class="topNewsList">
                        <h2>工房ニュース</h2>
                        <ul>
                        <?php
                                    $args = array(
                                        'post_type' => 'news_info', //カスタム投稿タイプ名
                                        'posts_per_page' => 5 //取得する投稿の件数
                                    );
                                    $my_query = new WP_Query( $args );
                                ?>
                                <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>"><data><?php the_time('Y-m-d'); ?>&nbsp;</data><span><?php the_title(); ?></span></a>
                                </li>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                        </ul>
                    </div>
                </section>

                <section class="topWorkshopUnder">
                    <ul>
                        <li class="twuLink01"><a href="<?php echo esc_url( home_url( '/contact') ); ?>"><span>お問い合わせはこちら</span></a></li>
                        <li class="twuLink02"><a href="<?php echo esc_url( home_url( '/reservation') ); ?>"><span>ご来店予約はこちら</span></a></li>
                    </ul>
                </section>
            </article>
        </main>

<?php get_footer(); ?>