#---------------------------
# This script generates a new pmpro-series.pot file for use in translations.
# To generate a new pmpro-series.pot, cd to the main /pmpro-series/ directory,
# then execute `languages/gettext.sh` from the command line.
# then fix the header info (helps to have the old pmpro.pot open before running script above)
# then execute `cp languages/pmpro-series.pot languages/pmpro-series.po` to copy the .pot to .po
# then execute `msgfmt languages/pmpro-series.po --output-file languages/pmpro-series.mo` to generate the .mo
#---------------------------
echo "Updating pmpro-series.pot... "
xgettext -j -o languages/pmpro-series.pot \
--default-domain=pmpro-series \
--language=PHP \
--keyword=_ \
--keyword=__ \
--keyword=_e \
--keyword=_ex \
--keyword=_n \
--keyword=_x \
--sort-by-file \
--package-version=1.0 \
--msgid-bugs-address="info@spaidmembershipspro.com" \
$(find . -name "*.php")
echo "Done!"