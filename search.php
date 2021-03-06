<?php
/*
Template Name: Search Results
*/
?>
<?php
require_once TEMPLATEPATH . "/assets/functions/GoogleSearch.php";
get_header(); ?>

<div class="row wrapper radius10" id="page">
	<main class="large-12 columns">
		<h1>Search Results</h1>
     
            <?php 
            try {
                $search = new KSAS_GoogleSearch();
                $resultsPageNum = 1;
                if (array_key_exists('resultsPageNum', $_REQUEST)) {
                    $resultsPageNum = $_REQUEST['resultsPageNum'];
                }
                $resultsPerPage = 10;
                $baseQueryURL = 'http://search.johnshopkins.edu/search?site=krieger_collection&client=ksas_frontend';
                $results = $search->query($_REQUEST['q'], $baseQueryURL, $resultsPageNum, $resultsPerPage);
                 
                $hits = $results->getNumHits();
                $displayQuery = $results->getDisplayQuery();
                $docTitle = 'Search Results';
                $sponsored_result = $results->getSponsoredResult();
            ?>

            <?php if ($hits > 0) { ?>
               <p>You are currently searching the Krieger network. Try searching the <a href="https://www.jhu.edu/search/">JHU network</a> for websites beyond KSAS.</p>
                <form class="search-form" action="<?php echo site_url('/search'); ?>" method="get">
                    <fieldset>
                        <label>
                            Search:
                            <input type="text" class="input-text" name="q" value="<?php echo $displayQuery ?>" />
                        </label>
                        <input type="submit" class="button blue_bg" id="search_again" value="Search Krieger Network" />
                            <label for="search_again" class="screen-reader-text">
                            Search Again
                            </label>
                    </fieldset>
                </form>       
                <p>Results <strong><?php echo $results->getFirstResultNum() ?> - <?php echo $results->getLastResultNum() ?></strong> of about <strong><?php echo $hits ?></strong></p>
           
            <?php if (empty($sponsored_result) == false) { ?>
    	        <div class="panel callout radius10" id="sponsored">
                    <h2 class="black">Featured Result</h2>
                    <h3><a href="<?php echo $sponsored_result['sponsored_url']; ?>"><?php echo $sponsored_result['sponsored_title']; ?></a><small class="italic"> &mdash;<?php echo $sponsored_result['sponsored_url']; ?></small></h3>
    	        </div>
             <?php } ?>   
            <div id="search-results">
                <ul>
           
                <?php while ($result = $results->getNextResult()) {
                    // note what results are PDFs
                    $pdfNote = '';
                    if (preg_match('{application/pdf}', $result['mimeType'])) {
                        $pdfNote = '<span class="black"><span class="fa fa-file-pdf-o" aria-hidden="true"></span> [PDF]</span>  ';
                } ?>
                    <li>
                        <h5><?php echo $pdfNote ?><a href="<?php echo $result['path'] ?>"><?php echo $result['title'] ?></a></h5>
                            <?php if (array_key_exists('description', $result) && $result['description']) { ?>
                                <p><?php echo $result['description'] ?></p>
                            <?php } ?>
                        <div class="url"><?php echo $result['path'] ?> - <?php echo $result['sizeHumanReadable'] ?></div>
                    </li>
                    <hr>
            <?php } ?>
                </ul>
            </div>
             
            <div class="section">

                <?php $notices = $results->getNotices(); foreach ($notices as $notice) { ?>
                    <p class="notice"><?php echo $notice ?></p>
                <?php } ?>

                <div class="pagination">
                         
                    <?php foreach ($results->getResultsetLinks() as $resultsetLink) {
                        print "$resultsetLink ";
                    } ?>
                    <?php echo $results->getNextLink() ?> 
                
                </div>
                 
            </div>
        <?php } else {
        // no hits
        ?>
             
        <?php $notices = $results->getNotices(); foreach ($notices as $notice) { ?>
            <p class="notice"><?php echo $notice ?></p>
         <?php } ?>
             
             <p>Sorry, No Results. Try your search again on <a href="https://www.jhu.edu/search/">JHU.edu</a>, or enter a new search term below:</p>
                <form class="search-form" action="<?php echo site_url('/search'); ?>" method="get">
                    <fieldset>
                        <label>
                            Search:
                            <input type="text" class="input-text" name="q" value="<?php echo $displayQuery ?>" />
                        </label>
                        <input type="submit" class="button blue_bg" id="search_again" value="Search Krieger Network" />
                            <label for="search_again" class="screen-reader-text">
                            Search Again
                            </label>
                    </fieldset>
                </form>        

        <?php }
        } catch (KSAS_GoogleSearchException $e) {
        $docTitle = "Search Temporarily Unavailable";
        ?>
        
    <div class="section">
        <p>We're sorry, the search engine is temporarily unavailable. Please try your search again later.</p>
    </div>

    <?php } ?>
	</main>
</div>

<?php get_footer(); ?>  