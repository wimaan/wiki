# wiki

The dockerized source for Wimaan.

References:
- [Femiwiki's Dockerized Source](https://github.com/femiwiki/docker-mediawiki)
- [MetaKGP's Dockerized Source](https://github.com/metakgp/metakgp-wiki)
- [Star Citizen's Dockerized Source](https://github.com/StarCitizenWiki/WikiDocker)

---
# blackbox
Collection of scripts to build/run/clean/backup/restore etc. Name: well, the whole Wimaan thing :) <br>
- `clean.sh` - stop running conts, prune stopped ones, **removes volumes**, **warning: removes all docker images, volumes, containers, not just wiki related**
- `run.sh` -  build and run conts, restore database^
- `restore-db.sh dump-file` - restore database only

Database dump file is expected to be produced from automysqlbackup/mysqldump - and named `old.sql` and placed in `blackbox` to ensure `run.sh` works *^(note script doesn't call restore-db correctly, please run restore-db separately)* <br>

You may either supply a code dump file generated from the wiki folder - and save it as an uncompressed tarball named `old.tar`, or build a fresh one, using `mw/build.sh`. The `old.tar` should be placed as `mw/old.tar`.
If building a fresh one, you need to:
1. Put in appropriate credentials (edit all the files with the suffix `_auth` in `mw/localsettings/`).
2. **After launching the containers**, run the postinstall script (`blackbox/migrate.sh`) - this updates the DB tables in case of a MediaWiki update
---
# running
- Copy over `env.template` to `env` and edit as required
- Copy over database dump file to `blackbox` (`blackbox/old.sql`) (and code dump to `mw/old.tar` if needed)
- Copy over the media dump file to `mw/images.tar.gz` if needed.
- Run `blackbox/run.sh`
- `restore-db` will fail as part of `run`, so manually run `blackbox/restore-db.sh old.sql`
---
# philosophies
* Q: I am new here. How do I understand this repository?
* A: Look at Docker's official guides. We recommend the DockerCon video by Peter McKee. After that, just dive into the docker-compose.yml file, and explore directory-by-directory the files that are present, and how they're referred to from other files. Reading through the Mediawiki Installation Guide (on mediawiki.org) will also be useful.

* Q: why use separate folders over a single compose + Dockerfile?
* A: Simpler to write complex configurations (for example using Certbot with Apache)

* Q: Apache vs nginx?
* A: nginx seems better, and we'll move over some day.

* Q: it seems too complex still.
* A: Feel free to open an issue for suggestions or clarifications! Please use the forum tag.
---