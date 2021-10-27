ATTACH TABLE _ UUID 'ce37b83f-ef39-4bdc-8e37-b83fef39fbdc'
(
    `event_date` Date,
    `event_time` DateTime,
    `event_time_microseconds` DateTime64(6),
    `name` LowCardinality(String),
    `value` Float64
)
ENGINE = MergeTree
PARTITION BY toYYYYMM(event_date)
ORDER BY (event_date, event_time)
SETTINGS index_granularity = 8192
