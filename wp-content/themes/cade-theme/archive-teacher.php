<?php get_header(); ?>
<main id="primary" class="site-main" style="padding: 2em;">
    <header class="page-header"><h1 class="page-title">Notre Équipe Pédagogique</h1></header>
    <?php if ( have_posts() ) : ?>
        <div class="teacher-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 2em;">
            <?php while ( have_posts() ) : the_post();
                $photo = get_field('photo_professionnelle'); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="border: 1px solid #ddd; text-align: center; padding: 1em;">
                    <?php if ( $photo ) : ?><a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($photo['sizes']['medium']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;"></a><?php endif; ?>
                    <header class="entry-header" style="margin-top: 1em;"><?php the_title( sprintf( '<h2 class="entry-title" style="font-size: 1.2em;"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?></header>
                    <div class="teacher-meta" style="font-size: 0.9em; color: #555;"><?php echo get_the_term_list( get_the_ID(), 'specialite', '', ', ' ); ?></div>
                </article>
            <?php endwhile; ?>
        </div>
        <?php get_template_part('template-parts/components/pagination'); // Ajout de la pagination ?>
    <?php else : ?>
        <section class="no-results not-found"><p>Aucun enseignant n'a été trouvé.</p></section>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
