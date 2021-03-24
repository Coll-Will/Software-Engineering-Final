# Manufacturer ID must be named MID when the manufacturer table is created.
ALTER TABLE shipments RENAME COLUMN WID TO MID;
# The following statements cannot be run until the "manufacturers" table is created.
ALTER TABLE shipments DROP FOREIGN KEY fk_WID;
ALTER TABLE shipments ADD CONSTRAINT fk_MID FOREIGN KEY (MID) REFERENCES manufacturers(MID);