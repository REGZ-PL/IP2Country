<?PHP

	FUNCTION IP2COUNTRY($IP) {
		$OUTPUT = ''; $MATCHES = [];
		IF ($FP = @FSOCKOPEN("whois.ripe.net", 43, $ERRNO, $ERRSTR, 30)) {
			IF(FWRITE($FP, $IP . "\r\n")) {
				WHILE (!FEOF($FP)) {
					$OUTPUT .= FGETS($FP, 128);
        }
				FCLOSE($FP);
				IF (PREG_MATCH("/country:\s+([a-z]{2})/i", $OUTPUT, $MATCHES)) {
					RETURN $MATCHES[1];
        }
			}
		}
		RETURN FALSE;
	}
