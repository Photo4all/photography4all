<?php
    /*
        Template Name: Pagina Categorias
    */
?>

<?php get_header(); ?>  

<!-- Grid sub-menu -->
<div id="contentNews"> 
    
    <!-- quandrado 1 -->
    <div class="quadrado">
       <div class="conteudo_quadrado">
            <div class="table">
                <div class="table-cell">
                    <a href="<?php echo get_post_meta($post->ID, 'Portfolio_4', true); ?>" class="info">
                        <img class="rs" src='<?php echo get_post_meta($post->ID, 'Casas', true); ?>' /> 
                    </a>
                        <p class="hide">Portfolio: <?php echo get_post_meta($post->ID, 'Shanghai', true); ?></p>
                        Date: <?php echo get_post_meta($post->ID, 'Data_4', true); ?>
                        <?php if(have_posts() ) :
                           while ( have_posts() ) : the_post(); 
                                   the_content(); 
                           endwhile; // Fim do loop
                           else :
                            echo '<p>No content found</p>';
                           endif;			
                        ?>   
                </div>
            </div>
        </div>
    </div>
    
    <!-- quandrado 2 -->
    <div class="quadrado">
       <div class="conteudo_quadrado">
            <div class="table">
                <div class="table-cell">
                    <a href="<?php echo get_post_meta($post->ID, 'Portfolio_4', true); ?>" class="info">
                        <img class="rs" src='<?php echo get_post_meta($post->ID, 'Cidades', true); ?>' /> 
                    </a>
                        Portfolio: <?php echo get_post_meta($post->ID, 'Shanghai', true); ?><br>
                        Date: <?php echo get_post_meta($post->ID, 'Data_4', true); ?>
                        <?php if(have_posts() ) :
                           while ( have_posts() ) : the_post(); 
                                   the_content(); 
                           endwhile; // Fim do loop
                           else :
                            echo '<p>No content found</p>';
                           endif;			
                        ?>   
                </div>
            </div>
        </div>
    </div>

    
    <!-- quandrado 3 -->
    <div class="quadrado">
       <div class="conteudo_quadrado">
            <div class="table">
                <div class="table-cell">
                    <a href="<?php echo get_post_meta($post->ID, 'Portfolio_4', true); ?>" class="info">
                        <img class="rs" src='<?php echo get_post_meta($post->ID, 'Desporto', true); ?>' /> 
                    </a>
                        Portfolio: <?php echo get_post_meta($post->ID, 'Shanghai', true); ?><br>
                        Date: <?php echo get_post_meta($post->ID, 'Data_4', true); ?>
                        <?php if(have_posts() ) :
                           while ( have_posts() ) : the_post(); 
                                   the_content(); 
                           endwhile; // Fim do loop
                           else :
                            echo '<p>No content found</p>';
                           endif;			
                        ?>   
                </div>
            </div>
        </div>
    </div>
    
    
    
    <!-- quandrado 4 -->
    <div class="quadrado">
       <div class="conteudo_quadrado">
            <div class="table">
                <div class="table-cell">
                    <a href="<?php echo get_post_meta($post->ID, 'Portfolio_4', true); ?>" class="info">
                        <img class="rs" src='<?php echo get_post_meta($post->ID, 'Animais', true); ?>' /> 
                    </a>
                        Portfolio: <?php echo get_post_meta($post->ID, 'Shanghai', true); ?><br>
                        Date: <?php echo get_post_meta($post->ID, 'Data_4', true); ?>
                        <?php if(have_posts() ) :
                           while ( have_posts() ) : the_post(); 
                                   the_content(); 
                           endwhile; // Fim do loop
                           else :
                            echo '<p>No content found</p>';
                           endif;			
                        ?>   
                </div>
            </div>
        </div>
    </div>   
    
    
    
    
    <!-- quandrado 5 -->
    <div class="quadrado">
       <div class="conteudo_quadrado">
            <div class="table">
                <div class="table-cell">
                    <a href="<?php echo get_post_meta($post->ID, 'Portfolio_5', true); ?>" class="info">
                        <img class="rs" src='<?php echo get_post_meta($post->ID, 'Paisagens', true); ?>' /> 
                    </a>
                        Portfolio: <?php echo get_post_meta($post->ID, 'Shanghai', true); ?><br>
                        Date: <?php echo get_post_meta($post->ID, 'Data_5', true); ?>
                        <?php if(have_posts() ) :
                           while ( have_posts() ) : the_post(); 
                                   the_content(); 
                           endwhile; // Fim do loop
                           else :
                            echo '<p>No content found</p>';
                           endif;			
                        ?>   
                </div>
            </div>
        </div>
    </div> 
    
    <!-- quandrado 6 -->
    <div class="quadrado">
       <div class="conteudo_quadrado">
            <div class="table">
                <div class="table-cell">
                    <a href="<?php echo get_post_meta($post->ID, 'Portfolio_4', true); ?>" class="info">
                        <img class="rs" src='<?php echo get_post_meta($post->ID, 'Tradicoes', true); ?>' /> 
                    </a>
                        Portfolio: <?php echo get_post_meta($post->ID, 'Shanghai', true); ?><br>
                        Date: <?php echo get_post_meta($post->ID, 'Data_4', true); ?>
                        <?php if(have_posts() ) :
                           while ( have_posts() ) : the_post(); 
                                   the_content(); 
                           endwhile; // Fim do loop
                           else :
                            echo '<p>No content found</p>';
                           endif;			
                        ?>   
                </div>
            </div>
        </div>
    </div>
    

    <!-- quandrado 7 -->
    <div class="quadrado">
       <div class="conteudo_quadrado">
            <div class="table">
                <div class="table-cell">
                    <a href="<?php echo get_post_meta($post->ID, 'Portfolio_4', true); ?>" class="info">
                        <img class="rs" src='<?php echo get_post_meta($post->ID, 'Viagens', true); ?>' /> 
                    </a>
                        Portfolio: <?php echo get_post_meta($post->ID, 'Shanghai', true); ?><br>
                        Date: <?php echo get_post_meta($post->ID, 'Data_4', true); ?>
                        <?php if(have_posts() ) :
                           while ( have_posts() ) : the_post(); 
                                   the_content(); 
                           endwhile; // Fim do loop
                           else :
                            echo '<p>No content found</p>';
                           endif;			
                        ?>   
                </div>
            </div>
        </div>
    </div>
    
    <!-- quandrado 8 -->
    <div class="quadrado">
       <div class="conteudo_quadrado">
            <div class="table">
                <div class="table-cell">
                    <a href="<?php echo get_post_meta($post->ID, 'Portfolio_4', true); ?>" class="info">
                        <img class="rs" src='<?php echo get_post_meta($post->ID, 'Aldeias', true); ?>' /> 
                    </a>
                        Portfolio: <?php echo get_post_meta($post->ID, 'Shanghai', true); ?><br>
                        Date: <?php echo get_post_meta($post->ID, 'Data_4', true); ?>
                        <?php if(have_posts() ) :
                           while ( have_posts() ) : the_post(); 
                                   the_content(); 
                           endwhile; // Fim do loop
                           else :
                            echo '<p>No content found</p>';
                           endif;			
                        ?>   
                </div>
            </div>
        </div>
    </div>
    
    <!-- quandrado 9 -->
    <div class="quadrado bg">
       <div class="conteudo_quadrado">
            <div class="table">
                <div class="table-cell">
                           This gallery is locked in order to unblock content please choose option:<br>
                        <?php
                            if (isset($_SESSION['user_id'])) {
                                echo '<a href="https://photography4all.net/index.php/privada/" class="navlink" title="View gallery">View gallery</a><br/>';
                                echo '<a href="https://photography4all.net/index.php/fotografias/" class="navlink" title="View photos">View photos</a><br/>';

                            /* Add links if the user is an administrator: */
                                if ($_SESSION['user_level'] == 1) {
                                    echo '<a href="https://photography4all.net/index.php/view_users/" class="navlink" title="View All Users">View Users</a><br/>
                                          <a href="https://photography4all.net/wp-admin/" class="navlink" target="_blank">Wordpress</a><br/>';
                                }

                        } else { //  Not logged in.

                                echo '<a href="https://photography4all.net/index.php/register/" class="navlink" title="Register for the Site">Register</a><br />
                                      <a href="https://photography4all.net/index.php/login/" class="navlink" title="Login">Login</a><br />
                                      <a href="https://photography4all.net/index.php/forgot_password/" class="navlink" title="Password Retrieval">Retrieve Password</a><br />';
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
    
    
</div><!-- Grid sub-menu -->

<?php get_footer(); ?>