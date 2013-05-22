#FRU 
#drush @fru.dev sql-query 'UPDATE users SET status=0 WHERE uid NOT IN (0,1)'
#drush rsync @fru.dev:%files @fru.prod:%files --exclude-conf
#drush sql-sync @fru.dev @fru.prod
#drush @fru.prod vset --exact file_public_path "sites/fru/files"
#drush @fru.prod vset --exact file_private_path "sites/fru/files/BACKUP"
#chown -R -f lpcms:psacln sites/fru/files
#chmod -R -f 0777 sites/fru/files

#VOL
#drush @vol.dev sql-query 'UPDATE users SET status=0 WHERE uid NOT IN (0,1)'
#drush rsync @vol.dev:%files @vol.prod:%files --exclude-conf
#drush sql-sync @vol.dev @vol.prod
#drush @vol.prod vset --exact file_public_path "sites/vol/files"
#drush @vol.prod vset --exact file_private_path "sites/vol/files/BACKUP"
#chown -R -f lpcms:psacln sites/vol/files
#chmod -R -f 0777 sites/vol/files

#WB
#drush @wb.dev sql-query 'UPDATE users SET status=0 WHERE uid NOT IN (0,1)'
drush rsync @wb.dev:%files @wb.prod:%files --exclude-conf
#drush sql-sync @wb.dev @wb.prod
#drush @wb.prod vset --exact file_public_path "sites/wb/files"
#drush @wb.prod vset --exact file_private_path "sites/wb/files/BACKUP"
chown -R -f lpcms:psacln sites/wb/files
chmod -R -f 0777 sites/wb/files


#WA BBA
#mv sites/wa-bba.localpoint-cms.com.localpoint-cms.com sites/wabba
#drush @wa.dev sql-query 'UPDATE users SET status=0 WHERE uid NOT IN (0,1)'
#drush rsync @wa.dev:%files @wa.prod:%files --exclude-conf
#drush sql-sync @wa.dev @wa.prod
#drush @wa.prod vset --exact file_public_path "sites/wabba/files"
#drush @wa.prod vset --exact file_private_path "sites/wabba/files/BACKUP"
#chown -R -f lpcms:psacln sites/wabba/files
#chmod -R -f 0777 sites/wabba/files


#reg

#mv sites/wa-bba.localpoint-cms.com.localpoint-cms.com sites/reg
#drush @reg.dev sql-query 'UPDATE users SET status=0 WHERE uid NOT IN (0,1)'
#drush rsync @reg.dev:%files @reg.prod:%files --exclude-conf
#drush sql-sync @reg.dev @reg.prod
#drush @reg.prod vset --exact file_public_path "sites/reg/files"
#drush @reg.prod vset --exact file_private_path "sites/reg/files/BACKUP"
#chown -R -f lpcms:psacln sites/reg/files
#chmod -R -f 0777 sites/reg/files


#ENT
#mv sites/wa-bba.localpoint-cms.com.localpoint-cms.com sites/ent
#drush @ent.dev sql-query 'UPDATE users SET status=0 WHERE uid NOT IN (0,1)'
#drush rsync @ent.dev:%files @ent.prod:%files --exclude-conf
#drush sql-sync @ent.dev @ent.prod
#drush @ent.prod vset --exact file_public_path "sites/ent/files"
#drush @ent.prod vset --exact file_private_path "sites/ent/files/BACKUP"
#chown -R -f lpcms:psacln sites/ent/files
#chmod -R -f 0777 sites/ent/files


#epo configuration
#mv sites/engadiner.localpoint-cms.com sites/epo
#drush @epo.dev sql-query 'UPDATE users SET status=0 WHERE uid NOT IN (0,1)'
#drush rsync @epo.dev:%files @epo.prod:%files --exclude-conf
#drush sql-sync @epo.dev @epo.prod
#drush @epo.prod vset --exact file_public_path "sites/epo/files"
#drush @epo.prod vset --exact file_private_path "sites/epo/files/BACKUP"
#chown -R -f lpcms:psacln sites/epo/files
#chmod -R -f 0777 sites/epo/files

#sur configuration
#mv sites/engadiner.localpoint-cms.com sites/sur
#drush @sur.dev sql-query 'UPDATE users SET status=0 WHERE uid NOT IN (0,1)'
#drush rsync @sur.dev:%files @sur.prod:%files --exclude-conf
#drush sql-sync @sur.dev @sur.prod
#drush @sur.prod vset --exact file_public_path "sites/sur/files"
#drush @sur.prod vset --exact file_private_path "sites/sur/files/BACKUP"
#chown -R -f lpcms:psacln sites/sur/files
#chmod -R -f 0777 sites/sur/files

#sb configuration
#mv sites/seetalerbote.localpoint-cms.com sites/sb
#drush @sb.dev sql-query 'UPDATE users SET status=0 WHERE uid NOT IN (0,1)'
#drush rsync @sb.dev:%files @sb.prod:%files --exclude-conf
#drush sql-sync @sb.dev @sb.prod
#drush @sb.prod vset --exact file_public_path "sites/sb/files"
#drush @sb.prod vset --exact file_private_path "sites/sb/files/BACKUP"
#chown -R -f lpcms:psacln sites/sb/files
#chmod -R -f 0777 sites/sb/files

#GRu configuration
#mv sites/lagruyere.localpoint-cms.com sites/gru
#drush @gru.dev sql-query 'UPDATE users SET status=0 WHERE uid NOT IN (0,1)'
#drush rsync @gru.dev:%files @gru.prod:%files --exclude-conf
#drush sql-sync @gru.dev @gru.prod
#drush @gru.prod vset --exact file_public_path "sites/gru/files"
#drush @gru.prod vset --exact file_private_path "sites/gru/files/BACKUP"
#chown -R -f lpcms:psacln sites/gru/files
#chmod -R -f 0777 sites/gru/files

#NFZ configuration
#mv sites/nfz.localpoint-cms.com sites/nfz
#drush @nfz.dev sql-query 'UPDATE users SET status=0 WHERE uid NOT IN (0,1)'
#drush rsync @nfz.dev:%files @nfz.prod:%files --exclude-conf
#drush sql-sync @nfz.dev @nfz.prod
#drush @nfz.prod vset --exact file_public_path "sites/nfz/files"
#drush @nfz.prod vset --exact file_private_path "sites/nfz/files/BACKUP"
#chown -R -f lpcms:psacln sites/nfz/files
#chmod -R -f 0777 sites/nfz/files

#SHLZ configuration
#mv sites/schaffhauserlandzeitung.localpoint-cms.com sites/shlz
#drush @shlz.dev sql-query 'UPDATE users SET status=0 WHERE uid NOT IN (0,1)'
#drush rsync @shlz.dev:%files @shlz.prod:%files --exclude-conf
#drush sql-sync @shlz.dev @shlz.prod
#drush @shlz.prod vset --exact file_public_path "sites/shlz/files"
#drush @shlz.prod vset --exact file_private_path "sites/shlz/files/BACKUP"
#chown -R -f lpcms:psacln sites/shlz/files
#chmod -R -f 0777 sites/shlz/files



