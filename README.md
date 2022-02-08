# wiki

The dockerized source for Wimaan.

References:
- [Femiwiki's Dockerized Source](https://github.com/femiwiki/docker-mediawiki)
- [MetaKGP's Dockerized Source](https://github.com/metakgp/metakgp-wiki)
- [Star Citizen's Dockerized Source](https://github.com/StarCitizenWiki/WikiDocker)

---
# blackbox
Collection of scripts to build/run/clean/backup/restore etc. Name: well, the whole Wimaan thing :) <br>
- `clean.sh` - stop running conts, prune stopped ones, **removes volumes**
- `run.sh` - build and run conts, restore database
- `restore-db.sh dump-file` - restore database only

Database dump file is expected to be produced from automysqlbackup/mysqldump - and named `old.sql` and placed in `blackbox` to ensure `run.sh` works *(note script doesn't work currently, run restore-db separately)* <br>

Code dump file is expected to be produced from the wiki folder - it is an uncompressed tarball named `old.tar`, placed in `mediawiki` to ensure the mediawiki container builds.
---
# running
- Copy over `env.template` to `env` and edit as required
- Copy over dump files to `blackbox` and `mediawiki` (`blackbox/old.sql` and `mediawiki/old.tar`)
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

* Q: why is it so plain: what's the point of copying over all the files directly from the current production? how would it help maintainenance?
* A: The repo is currently a quick and dirty solution to get up and running. Will break down the mediawiki image to be built from individual sources soon.
---