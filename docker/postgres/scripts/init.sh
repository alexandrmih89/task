DB_DUMP_LOCATION="/tmp/psql_data/dump.sql"
echo "-------------------------------------------------------------------"

# DB got created from .env file, so no need to create explicitly
gosu postgres psql $POSTGRES_DB < $DB_DUMP_LOCATION