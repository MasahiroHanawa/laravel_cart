FROM docker.elastic.co/elasticsearch/elasticsearch:6.2.4

EXPOSE 9200 9300

COPY elasticsearch.yml /usr/share/elasticsearch/config/elasticsearch.yml

RUN bin/elasticsearch-plugin install analysis-icu
