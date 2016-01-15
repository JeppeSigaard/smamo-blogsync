<?php 

// Indlæs Scripts og styles
add_action('admin_enqueue_scripts','smamo_blogsync_scripts');
function smamo_blogsync_scripts(){
    if(isset($_GET['page']) && 'smamo-blogsync' === $_GET['page']){
        wp_enqueue_script( 'smamo_blogsync_script', plugin_dir_url( __FILE__ ) . 'assets/js/main.min.js');
        wp_enqueue_style( 'smamo_blogsync_style', plugin_dir_url( __FILE__ ) . 'assets/css/main.css', false, false, 'all' );      
    }
}

// Opret indstillingsside
add_action( 'admin_menu', 'smamo_blogsync_options_menu' );
function smamo_blogsync_options_menu() {
    add_options_page('Blog Syncer','Synkronisering','manage_options','smamo-blogsync','smamo_blogsync_options');
}

function smamo_blogsync_options(){
    
    if (get_option('smamo_blogsync')){
        $sync_options = get_option('smamo_blogsync');
    ?>
    <div class="wrap smamo_blog_sync_wrap" data-ajax-url="<?php echo admin_url('admin-ajax.php'); ?>">
        <h2>Indstillinger for sykronisering</h2>
        <p>Konfigurer og rediger automatisk synkronisering af indlæg fra andre WordPress installationer</p>
        <hr>
        <section class="api-settings">
            <h3>API oplysninger</h3>
            <p>Oplysningerne bruges på andre hjemmesider til at godkende synkronisering.</p>
            <p>
                <label>Website titel</label>
                <input class="key-field widefat" name="api-website" type="text" disabled value="<?php echo get_bloginfo('url') ?>"/>
            </p>
            <p>
                <label>API nøgle</label>
                <input class="key-field widefat" id="api-key" name="api-key" type="text" disabled value="<?php echo $sync_options['api']['key'] ?>"/>
            </p>
            <p>
                <label>API secret</label>
                <input class="key-field widefat" id="api-secret" name="api-secret" type="text" disabled value="<?php echo $sync_options['api']['secret'] ?>"/>
            </p>
            <p>
                <input type="button" class="button" id="smamo-blogsync-reset-keys" value="Generer nye nøgler" />
            </p>
        </section>
        <hr>
        <section class="sync-settings">
            <h3>Sammenkædninger</h3>
            <p class="loading-text">Henter indstillinger... <img src="<?php echo plugin_dir_url( __FILE__ ) . 'assets/img/reload.gif' ?>"></p>
            <ul class="sync-list">
                <li class="sync-item success">
                    <span class="sync-web">http://smamo.dk/</span>
                    <span class="sync-key">Ma^IG3eO@vYF8bLf</span>
                    <span class="sync-secret">················</span>
                    <span class="sync-status"><a href="#" class="delete"></a></span>
                </li>
                <li class="sync-item error">
                    <span class="sync-web">http://smamo.dk/</span>
                    <span class="sync-key">Ma^IG3eO@vYF8bLf</span>
                    <span class="sync-secret">················</span>
                    <span class="sync-status"><a href="#" class="delete"></a></span>
                </li>
                <li class="sync-item loading">
                    <span class="sync-web">http://smamo.dk/</span>
                    <span class="sync-key">Ma^IG3eO@vYF8bLf</span>
                    <span class="sync-secret">················</span>
                    <span class="sync-status"><a href="#" class="delete"></a></span>
                </li>
                <li class="sync-add">
                    <input class="sync-web" name="add-web" placeholder="Tilføj nyt website">
                    <input class="sync-key" name="add-key" placeholder="Angiv den nye sides API-nøgle">
                    <input class="sync-secret" name="add-secret" placeholder="Angiv API secret">
                    <span class="sync-status"><a class="sync-add-button">Tilføj</a></span>
                </li>
            </ul>
            <a href="#" class="sync-add-init">Tilføj en ny synkroniseringsforbindelse</a>
        </section>
    </div>
<?php }
    else{ ?>
    <div class="wrap">
        <h2>FEJL</h2>
        <p>Blog Syncer mangler 'smamo_blogsync' array for at kunne varetage indstillinger på denne hjemmeside.</p>
    </div>
        
    <?php }
} 

