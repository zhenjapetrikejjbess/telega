ATTACH TABLE _ UUID 'e54ebd40-3579-4456-a54e-bd403579a456'
(
    `id` Int32,
    `name1` String,
    `name2` String
)
ENGINE = MergeTree
ORDER BY id
SETTINGS index_granularity = 8192
