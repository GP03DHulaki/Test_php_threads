# Test_php_threads
To Solve Multiple threads oversale for file or slq.

剩余数量大于connection的时候直接抢购，剩余数量小于connection大于零的时候使用文件锁并行化处理抢购防止减少为负，剩余小于connection的时候无法操作。
