<div id="block_torrents">
    <div>
        <a class="btn btn-primary" href="/torrents">Browse Torrents</a>
        <a class="btn btn-primary" href="/torrents/latest">Latest Torrents</a>
        <a class="btn btn-primary" href="/torrents/search">Search</a>
    </div>
    <?php if (!empty($aIndexTorrentsList)) { ?>
    <?php } else { ?>
        <b>No uploads found.</b>
    <?php } ?>
</div>
