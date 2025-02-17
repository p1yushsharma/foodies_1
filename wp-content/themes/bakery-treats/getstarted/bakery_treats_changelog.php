<div class="changelog_container">
    <?php
    $bakery_treats_changelog_entries = get_changelog_from_readme();
    if (!empty($bakery_treats_changelog_entries)) :
        foreach ($bakery_treats_changelog_entries as $bakery_treats_entry) :
            $bakery_treats_version = esc_html($bakery_treats_entry[1]);
            $bakery_treats_date = esc_html($bakery_treats_entry[2]);
            $bakery_treats_details = explode("\n", trim($bakery_treats_entry[3]));
            ?>
            <div class="changelog_element">
                <span class="theme_version">
                    <strong><?php echo 'v' . $bakery_treats_version; ?></strong>
                    <?php echo 'Release date: ' . $bakery_treats_date; ?>
                    <span class="dashicons dashicons-arrow-down-alt2"></span>
                </span>

                <div class="changelog_details" style="display: none;">
                    <ul>
                        <?php foreach ($bakery_treats_details as $bakery_treats_detail) : ?>
                            <li><?php echo esc_html(trim($bakery_treats_detail, "- \t")); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php
        endforeach;
    else :
        ?>
        <p><?php esc_html_e('No changelog available.', 'bakery-treats'); ?></p>
    <?php endif; ?>
</div>